<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MiddlewareLockUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_locked) { // Kiểm tra xem người dùng có thuộc nhóm admin không
            Auth::logout();
            return redirect()->route('login.view')->with('warning', 'Tài khoản của bạn bị khóa do admin!');
        }

        return $next($request);
    }
}
