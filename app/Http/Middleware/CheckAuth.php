<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    { 
        if ($role == 'admin') {
            if(auth()->guard('user')->check()){
                if (auth()->guard('user')->user()->id_cate_member == 1) {
                    return $next($request);
                } else {
                    return redirect('/admin/login');
                }
            }
            else{
                return redirect('/admin/login');
            }
        } else {
            if(auth()->guard('user')->check()){
                if (auth()->guard('user')->user()->id_cate_member != 1 ) {
                    return $next($request);
                } else {
                    return redirect('/admin/login');
                }
            }
            else{
                return redirect('/admin/login');
            }
        }
    }
}
