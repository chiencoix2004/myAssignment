<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
            if (Auth::user()->role == '1') {
                return $next($request);
            } else {
                //điều hướng về user
            }
        } else {
            return redirect()->route('login')->with([
                'message' => 'Ban phai dang nhap truoc'
            ]);
        }
    }
}
