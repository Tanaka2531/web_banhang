<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::guard('client')->check()) {
            $user = Auth::guard('client')->user();
            if ($user->role == 2 && $user->status == 1) {
                return $next($request);
            } else {
                Auth::logout();
                return redirect()->route('clientIndex');
            }
        } else
            return redirect('/');
    }
}
