<?php

namespace App\Services\AutoTranslator;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DeeplDriver implements DriverInterface
{
    private string $apiKey;

    private string $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.deepl.key', '');
        $this->baseUrl = config('services.deepl.base_url', 'https://api-free.deepl.com/v2');
    }

    public function translate(string $text, string $targetLocale, string $sourceLocale = 'en'): ?string
    {
        if (blank($this->apiKey) || blank($text)) {
            return null;
        }

        // DeepL uses 'ZH' for Chinese (Simplified) and 'ZH-HANT' for Traditional
        $target = match ($targetLocale) {
            'zh' => 'ZH',
            'zh-Hant' => 'ZH-HANT',
            default => strtoupper($targetLocale),
        };

        $source = strtoupper($sourceLocale);

        try {
            $response = Http::withHeaders([
                'Authorization' => "DeepL-Auth-Key {$this->apiKey}",
                'Content-Type' => 'application/json',
            ])->post("{$this->baseUrl}/translate", [
                'text' => [$text],
                'target_lang' => $target,
                'source_lang' => $source,
            ]);

            if ($response->successful()) {
                $translations = $response->json('translations');

                return $translations[0]['text'] ?? null;
            }

            Log::warning('DeepL API error', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
        } catch (\Throwable $e) {
            Log::error('DeepL translation exception', ['message' => $e->getMessage()]);
        }

        return null;
    }
}
