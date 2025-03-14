<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin_login')->with('error', 'Bạn cần đăng nhập để truy cập!');
        }

        if (Auth::guard('admin')->user() === null) {
            Auth::guard('admin')->logout();
            return redirect()->route('admin_login')->with('error', 'Phiên đăng nhập đã hết hạn, vui lòng đăng nhập lại!');
        }

        return $next($request);
    }
}
