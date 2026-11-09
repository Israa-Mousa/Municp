<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetAppLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $supportedLanguages = ['ar', 'en'];
        $normaliseLanguage = static function ($language) use ($supportedLanguages): ?string {
            if (! is_string($language) || ! preg_match('/^(ar|en)(?:-[a-z0-9]{2,8})?$/i', trim($language))) {
                return null;
            }

            return strtolower(substr(trim($language), 0, 2));
        };

        $default = $normaliseLanguage(config('app.locale')) ?? 'ar';
        $preferredLanguage = $request->getPreferredLanguage($supportedLanguages) ?? $default;
        $sessionLanguage = $normaliseLanguage(Session::get('locale'));
        $requestedLanguage = $normaliseLanguage($request->input('lang'));
        $language = $requestedLanguage ?? $sessionLanguage ?? $preferredLanguage;

        App::setLocale($language);
        Session::put('locale', $language);

        return $next($request);
    }
}
