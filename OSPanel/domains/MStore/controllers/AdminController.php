<?php

/**
 * Управляет главной страницей админ панели.
 */
class AdminController
{
    /**
     * Главная страница.
     */
    public function actionIndex()
    {
        AdminBase::checkAdmin();

        require_once ROOT . '/views/admin/index.php';
        return true;
    }
}
