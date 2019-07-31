<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class ProductController
{

    public function actionView($productId)
    {
        $categories = Category::getCategoryList();

        $product = Product::getProductById($productId);

        $products = Product::getLatestProducts(4);

        require_once ROOT . '/views/product/view.php';

        return true;
    }
}
