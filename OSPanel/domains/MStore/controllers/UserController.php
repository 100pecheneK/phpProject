<?php

class UserController
{
    public function actionRegister()
    {

        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name))
                $errors[] = 'Имя должно быть длиннее двух символов';

            if (!User::checkEmail($email))
                $errors[] = 'Email неверный';

            if (!User::checkPassword($password))
                $errors[] = 'Пароль должен быть длиннее шести символов';

            if (User::checkEmailExists($email))
                $errors[] = 'Такой Email существует';

            if ($errors == false) {
                $userId = User::register($name, $email, $password);
                User::auth($userId);
                header("Location: /");
                $result = true;
            }
        }

        $categories = Category::getCategoryList();
        require_once ROOT . '/views/user/register.php';

        return true;
    }

    public function actionLogin()
    {

        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors[] = 'Email или пароль введены не верно.';
            } else {
                User::auth($userId);
                header("Location: /account");
            }
        }
        
        $categories = Category::getCategoryList();
        require_once ROOT . '/views/user/login.php';

        return true;
    }

    public function actionLogout()
    {
        User::logout();

        return true;
    }
}
