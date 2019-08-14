<?php
/**
 * Содержит в себе функции проверки пользователя на администратора.
 */
class AdminBase
{
    public static function checkAdmin()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        if ($user->role == 'admin')
            return true;
        die('Access denied');
    }
    public static function checkHeaderAdmin()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        if ($user->role == 'admin')
            return true;
        return false;
    }
}
