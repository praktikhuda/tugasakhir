<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Session::has('username')) {
        //     return redirect('/viewapp');
        // }

        if (Session::has('role') == 'pelanggan') {
            return redirect()->route('dashboard');
        }

        if (Session::has('role') == 'admin' || Session::has('role') == 'teknisi') {
            return redirect()->route('viewapp');
        }

        return $next($request);
    }
}
