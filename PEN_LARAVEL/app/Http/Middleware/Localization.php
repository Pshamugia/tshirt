<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }
        
        if(request()->lang=='en') {
            app()->setLocale('en');
            session()->put('locale', 'en');
            return redirect()->back(); 
        }
        if(request()->lang=='ka' || !Session::get('locale')) {
            app()->setLocale('ka');
            session()->put('locale', 'ka');
            return redirect()->back();   
        }

        View::share('lang', Session::get('locale'));
        
        return $next($request);
    }
}