<?php

namespace App\Services\AutoTranslator;

interface DriverInterface
{
    public function translate(string $text, string $targetLocale, string $sourceLocale = 'en'): ?string;
}
