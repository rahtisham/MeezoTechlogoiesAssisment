<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAuthPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $CheckAuthPermission)
    {
        if(Auth()->check()) {

            if ($CheckAuthPermission == "admin" && auth()->user()->role_id != 1) {
                abort('404');
            }

            if ($CheckAuthPermission == "teacher" && auth()->user()->role_id != 2) {
                abort('404');
            }
            if ($CheckAuthPermission == "student" && auth()->user()->role_id != 3) {
                abort('404');
            }
            return $next($request);

        }
    }
}
