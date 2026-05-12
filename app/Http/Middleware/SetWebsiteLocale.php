<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class SetWebsiteLocale
{
    public function handle(Request $request, Closure $next)
    {
        $supportedLocales = ['zh-Hant', 'zh', 'en'];
        $locale = session('website_locale', $request->cookie('website_locale', 'zh-Hant'));

        if (! in_array($locale, $supportedLocales, true)) {
            $locale = 'zh-Hant';
        }

        App::setLocale($locale);

        $response = $next($request);
        Cookie::queue('website_locale', $locale, 60 * 24 * 365);

        return $response;
    }
}
