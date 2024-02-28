<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user has a locale preference stored in the session
        $locale = $request->session()->get('locale');

        // If no session locale, use the default locale from config
        if (!$locale) {
            $locale = config('app.locale');
        }

        // Set the application locale
        app()->setLocale($locale);

        return $next($request);
    }
}
