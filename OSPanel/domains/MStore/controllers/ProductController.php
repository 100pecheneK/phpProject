<?php

/**
 * Управляет функциями продукта.
 */
class ProductController
{
    /**
     * Отображение страницы продукта.
     */
    public function actionView($productId)
    {
        $categories = Category::getCategoryList();

        $product = Product::getProductById($productId);

        $caruselProducts = Product::getRecommendedProducts();
        $products = Product::getLatestProducts(4);

        require_once ROOT . '/views/product/view.php';

        return true;
    }
}
