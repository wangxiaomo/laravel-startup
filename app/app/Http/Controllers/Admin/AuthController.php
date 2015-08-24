<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\AdminUser;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request) {
        if($request->user) {
            return redirect()->action('Admin\IndexController@index');
        }
        return "需要登录";
    }

    public function hack(Request $request) {
        $request->user = AdminUser::login('wangxiaomo', '123123123');
        return redirect()->action('Admin\IndexController@index');
    }

    public function logout(Request $request) {
        $user = AdminUser::get_by_session();
        $user && $user->logout();
        return redirect()->action('Admin\AuthController@login');
    }
}
