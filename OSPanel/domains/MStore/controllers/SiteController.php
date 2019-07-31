<?php
include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class SiteController
{ 
    public function actionIndex()
    {
        $categories = Category::getCategoryList();
        $products = Product::getLatestProducts();
        
        require_once ROOT . '/views/site/index.php';

        return true;
    }
}
