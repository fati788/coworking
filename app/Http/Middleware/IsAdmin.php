<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Si el usuario está logueado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        //Si el usuario no es administrador
        if (!Auth::user()->admin) {
            abort(403);
        }

        return $next($request);
    }
}
