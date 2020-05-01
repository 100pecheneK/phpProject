<?php

/**
 * Управляет пользователями в админ панели.
 */
class AdminUserController
{
    /**
     * READ.
     */
    public function actionIndex($order = 'id', $sort = 'ASC', $page = 1)
    {
        AdminBase::checkAdmin();

        $count_users = 30;
        $users = User::getUsersList($page, $count_users, $order, $sort);
        $total_count = User::getTotalUsers();
        $pagination = new Pagination($total_count, $count_users, $page);

        require_once ROOT . '/views/admin/user/read.php';
        return true;
    }
    /**
     * DELETE.
     */
    public function actionDelete($id)
    {
        AdminBase::checkAdmin();

        if (isset($_POST['submit'])) {
            User::deleteUserById($id);
            header("Location: /admin/user");
        }

        require_once ROOT . '/views/admin/user/delete.php';
        return true;
    }
    /**
     * CREATE.
     */
    public function actionCreate()
    {
        AdminBase::checkAdmin();

        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['email'] = $_POST['email'];
            $options['password'] = $_POST['email'];
            $options['role'] = $_POST['role'];

            $errors = false;

            // !Добавить валидацию

            if ($errors == false) {
                $id = User::createUser($options);

                header('Location: /admin/user');
            }
        }

        require_once ROOT . '/views/admin/user/create.php';
        return true;
    }
    /**
     * UPDATE.
     */
    public function actionUpdate($id)
    {
        AdminBase::checkAdmin();

        $user = R::findOne('users', 'id = ?', array($id));

        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['email'] = $_POST['email'];
            $options['password'] = $_POST['password'];
            $options['role'] = $_POST['role'];
            $errors = false;

            // !Добавить валидацию

            if ($errors == false) {
                $id = User::updateUser($user, $options);

                header('Location: /admin/user');
            }
        }

        require_once ROOT . '/views/admin/user/update.php';
        return true;
    }
}
