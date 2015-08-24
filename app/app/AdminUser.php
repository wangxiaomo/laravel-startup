<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AdminUser extends Model
{
    protected $table = 'admin_users';
    protected $fillable = ['username', 'password'];
    protected $hidden = ['password', 'remember_token'];

    public static function add($username, $password) {
        $user = new AdminUser;
        $user->username = $username;
        $user->password = md5(md5($password));
        $user->save();
        return $user;
    }

    public static function get($id) {
        return AdminUser::findOrFail($id);
    }

    public static function get_by_username($username) {
        return AdminUser::where('username', $username)->firstOrFail();
    }

    public static function get_by_session() {
        return \Session::get('admin_user', null);
    }

    public static function login($username, $password) {
        $user = AdminUser::where('username', $username)
                ->where('password', md5(md5($password)))
                ->first();
        \Session::put('admin_user', $user);
        return $user;
    }

    public function logout() {
        \Session::forget('admin_user');
    }

    public function update_password($password) {
        $this->password = md5(md5($password));
        $this->save();
    }
}
