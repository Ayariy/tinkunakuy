<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {

        // get the subdomain if exists
        $urlArray = explode('.', parse_url($request->url(), PHP_URL_HOST));

        // dd($urlArray);
        if (count($urlArray) < 2) {
            return $next($request);
        }
        // // if it's the default language: redirect to URL without subdomain
        // if ($subdomain == 'en') {

        //     $baseUrl = str_replace('//en.', '//', $request->url());
        //     return redirect()->to($baseUrl);
        // }

        $subdomain = $urlArray[0];

        // if it's a valid language, set as locale and set time zone
        if (array_key_exists($subdomain, config()->get('app.locales'))) {

            App::setLocale($subdomain);
            // $out = new \Symfony\Component\Console\Output\ConsoleOutput();
            // $out->writeln("Hello from Terminal" . $subdomain);
            session()->put('locale', $subdomain);
        }

        return $next($request);
        // if (session()->has('locale')) {
        //     App::setLocale(session()->get('locale'));
        // }

        // return $next($request);
    }
}