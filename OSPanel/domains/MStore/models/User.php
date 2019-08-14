<?php
/**
 * ! Остановился коментировать тут
 */
class User
{
    public static function register($name, $email, $password)
    {
        $user = R::dispense('users');
        $user->name = $name;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $id = R::store($user);
        return $id;
    }

    public static function checkName($name)
    {
        if (strlen($name) >= 2 && strlen($name) <= 191) return True;
        return False;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) return True;
        return False;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 5) return True;
        return False;
    }

    public static function checkEmailExists($email)
    {
        if (R::count('users', "email = ?", array($email)) > 0) {
            return True;
        }
        return False;
    }

    public static function checkUserData($email, $password)
    {
        $user = R::findOne('users', 'email = ?', array($email));
        if ($user) {
            if (password_verify($password, $user->password)) {
                return $user->id;
            }
        }
        return false;
    }

    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function logout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function getUserById($id)
    {
        if ($id) {
            $user = R::findOne('users', 'id = ?', array($id));
            return $user;
        }
    }

    public static function saveSettings($user, $email, $name, $password)
    {
        $user->name = $name;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);

        R::store($user);

        return true;
    }
    // Админка
    public static function getUsersList($page, $count = self::SHOW_BY_DEFAULT, $order, $sort)
    {
        $page = intval($page);
        $offset = ($count * $page) - $count;
        $users = R::getAll("SELECT id, name, email, role FROM users ORDER BY " . $order . " " . $sort . " LIMIT ? OFFSET ?", array(
            $count,
            $offset
        ));
        return $users;
    }
    public static function deleteUserById($id)
    {
        R::exec('DELETE FROM `users` WHERE `id` = ?', array($id));
        return true;
    }
    public static function createUser($options)
    {
        $user = R::dispense('users');
        $user->name = $options['name'];
        $user->email = $options['email'];
        $user->password = password_hash($options['password'], PASSWORD_DEFAULT);
        $user->role = self::getUserRoleByInt($options['role']);
        R::store($user);
    }
    public static function getUserRole($role)
    {
        switch ($role) {
            case 'user':
                $role = 'Пользователь';
                break;
            case 'admin':
                $role = 'Администратор';
                break;
            default:
                $role = 'Пользователь';
                break;
        }
        echo $role;
    }
    private static function getUserRoleByInt($role)
    {
        switch ($role) {
            case 1:
                $role = 'user';
                break;
            case 0:
                $role = 'admin';
                break;
            default:
                $role = 'user';
                break;
        }
        return $role;
    }
    public static function getTotalUsers()
    {
        $total_count = R::count('users');
        return $total_count;
    }
    public static function updateUser($user, $options)
    {
        $user->name = $options['name'];
        $user->email = $options['email'];
        if ($options != '')
            $user->password = password_hash($options['password'], PASSWORD_DEFAULT);
        $user->role = self::getUserRoleByInt($options['role']);;
        R::store($user);
    }
}
