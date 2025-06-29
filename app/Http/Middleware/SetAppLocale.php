<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
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


      //  App::setlocale($request->input('lang','en')); based on request without session

    //   $lang=$request->input('lang',Session::get('locale','en'));
    //        App::setLocale($lang);
    //        Session::put('locale',$lang); //based on  session

    $default = 'en';

    // Get language from the Accept-Language header
    $language = $request->header('Accept-Language');

    if ($language) {
        $languages = explode(',', $language);
        $default = $languages[0] ?? 'en'; // Safely get the first language

        if (strlen($default) === 5) {
            $default = substr($default, 0, 2); // Extract only the language code (e.g., "en" from "en-US")
        }
    }

    // Get language from request input or session, defaulting to the detected language
    $lang = $request->input('lang', Session::get('locale', $default));

    App::setLocale($lang);
    Session::put('locale', $lang); // Store in session

    return $next($request);
}
}
