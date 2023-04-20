<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //check locale is already set
        if (!session()->has('locale')) session()->put('locale', 'ckb');
        //return locale page
        // // \setlocale(\LC_ALL, 'ckb');
        // // Carbon::setLocale('ckb');
        // $translator = \Carbon\Translator::get('ku');
        // $translator->setTranslations(\Carbon\Translator::get('ckb')->getMessages('ckb'));

        // // \dd(Carbon::getLocale());
        App::setLocale(session('locale'));
        URL::defaults(['locale' => session('locale')]);
        return $next($request);
    }
}
