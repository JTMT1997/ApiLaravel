<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()&&Auth::user()->roles=='Admin'){
            return $next($request);

            // return redirect('admin');
        }
        else if(Auth::user()&&Auth::user()->roles=='User'){
            // return view('book.index');
            // return view('admin.index');
            // return $next('h');
            return redirect('home');


        }
        // return $next($request);
    }
}
