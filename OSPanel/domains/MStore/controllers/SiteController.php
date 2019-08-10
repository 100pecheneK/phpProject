<?php
include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class SiteController
{
    public function actionIndex()
    {
        $categories = Category::getCategoryList();
        $products = Product::getLatestProducts();
        $caruselProducts = Product::getRecommendedProducts();

        require_once ROOT . '/views/site/index.php';

        return true;
    }

    public function actionContact()
    {
        // 1) отправка почты
        // 2) возможен второй вариант через VK API (надо запросить права у поддержки)
        return true;
    }
}
