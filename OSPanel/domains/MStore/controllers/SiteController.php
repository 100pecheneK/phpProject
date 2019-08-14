<?php

/**
 * Управляет функциями главной страницы сайта.
 */
class SiteController
{
    /**
     * Отображение главной страницы сайта.
     */
    public function actionIndex()
    {
        $categories = Category::getCategoryList();
        $products = Product::getLatestProducts();
        $caruselProducts = Product::getRecommendedProducts();

        require_once ROOT . '/views/site/index.php';

        return true;
    }
    /**
     * Отображение контактной формы поддержки.
     */
    public function actionContact()
    {
        // 1) отправка почты
        // 2) возможен второй вариант через VK API (надо запросить права у поддержки)
        require_once ROOT . '/views/site/contact.php';
        return true;
    }
}
