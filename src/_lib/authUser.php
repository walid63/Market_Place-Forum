<?php
class AuthUser
{
    private static $user = null;

    public static function getUser()
    {
        if (self::$user === null) {
            if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                self::$user = $_SESSION['user'];
            } else {
                self::$user = false;
            }
        }

        return self::$user;
    }

    public static function isLoggedIn()
    {
        return isset($_SESSION['user']) && is_array($_SESSION['user']);
    }

    public static function getUserId()
    {
        $user = self::getUser();
        return $user ? $user['id'] : null;
    }

    public static function getUsername()
    {
        $user = self::getUser();
        return $user ? $user['username'] : null;
    }

    public static function getEmail()
    {
        $user = self::getUser();
        return $user ? $user['email'] : null;
    }

}
