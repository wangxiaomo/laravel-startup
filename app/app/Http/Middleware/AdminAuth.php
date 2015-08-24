<?php

namespace App\Http\Middleware;

use Closure;
use App\AdminUser;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = AdminUser::get_by_session();
        if($user) {
            $request->user = $user;
            return $next($request);
        }else {
            return redirect()->action('Admin\AuthController@login');
        }
    }
}
