<?php

namespace AngryMoustache\Rambo;

use AngryMoustache\Rambo\Models\Administrator;

class RamboAuth
{
    public static $session = 'rambo.auth';

    public static function user()
    {
        return session(self::$session, null);
    }

    public static function hash($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function login($email, $password)
    {
        $user = Administrator::where('email', $email)
            ->get()
            ->skipUntil(function ($user) use ($password) {
                return (password_verify($password, $user->password));
            })
            ->first();

        session([self::$session => $user]);

        return $user;
    }

    public static function logout()
    {
        session()->forget(self::$session);
    }
}
