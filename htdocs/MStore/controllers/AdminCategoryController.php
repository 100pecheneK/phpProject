<?php

/**
 * Управляет категориями в админ панели.
 */
class AdminCategoryController
{
    /**
     * READ.
     */
    public function actionIndex()
    {
        AdminBase::checkAdmin();

        $categories = Category::getCategoryList();

        require_once ROOT . '/views/admin/category/read.php';
        return true;
    }
    /**
     * DELETE.
     */
    public function actionDelete($id)
    {
        AdminBase::checkAdmin();

        if (isset($_POST['submit'])) {
            Category::deleteCategoryById($id);
            header("Location: /admin/category");
        }

        require_once ROOT . '/views/admin/category/delete.php';
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
            $options['status'] = $_POST['status'];

            $errors = false;

            // !Добавить валидацию

            if ($errors == false) {
                $id = Category::createCategory($options);

                header('Location: /admin/category');
            }
        }

        require_once ROOT . '/views/admin/category/create.php';
        return true;
    }
    /**
     * UPDATE.
     */
    public function actionUpdate($id)
    {
        AdminBase::checkAdmin();
        $category = R::findOne('categories', 'id = ?', array($id));

        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['status'] = $_POST['status'];

            $errors = false;

            // !Добавить валидацию

            if ($errors == false) {
                $id = Category::updateCategory($category, $options);

                header('Location: /admin/category');
            }
        }

        require_once ROOT . '/views/admin/category/update.php';
        return true;
    }
}
