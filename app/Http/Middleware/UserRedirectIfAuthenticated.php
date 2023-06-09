<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if(Auth::check()) { // if user reload padge or authanticate

            Cache::put('user-is-online'.Auth::user()->id,true,Carbon::now()->addSeconds(30));

            User::where('id',Auth::user()->id)->update(['last_seen'=> Carbon::now()]);


        }
        if(Auth::check() && Auth::user()) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
        
    }
}
