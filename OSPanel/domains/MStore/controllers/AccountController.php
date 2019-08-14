<?php

/**
 * Управляет функциями аккаунта.
 */
class AccountController
{
    /**
     * Главная страница аккаунта.
     */
    public function actionIndex()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $categories = Category::getCategoryList();
        require_once ROOT . '/views/account/index.php';

        return true;
    }
    /**
     * Страница настроек.
     */
    public function actionSettings()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);
        $result = false;

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = $_POST['password'];

            $errors = false;

            if ($email != $user->email) {
                if (User::checkEmailExists($email))
                    $errors[] = 'Email занят';
            }

            if (!User::checkName($name))
                $errors[] = 'Имя должно быть длиннее двух символов';

            if (!User::checkPassword($password))
                $errors[] = 'Пароль должен быть длиннее шести символов';

            if (!$errors) {
                $result = User::saveSettings($user, $email, $name, $password);
            }
        }

        $categories = Category::getCategoryList();
        require_once ROOT . '/views/account/settings.php';

        return true;
    }
}
