<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/loginn')->with('error', 'Bạn cần đăng nhập để truy cập!');
        }
        if (!Auth::check() && Auth::user()->status == 0) {
            Auth::logout();
            return redirect('/loginn')->withErrors(['email' => 'Tài khoản của bạn chưa được kích hoạt. Vui lòng kiểm tra email!']);
        }
        return $next($request);
    }
}
