<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Owner
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
        //MENGATUR AGAR YANG BISA MASUK HALAMAN DENGAN MIDDLEWARE OWNER HANYA USER DENGAN ROLE "OWNER"
        if (Auth::user()->role != "OWNER") {
            return redirect('/');
        }
        return $next($request);
    }
}
