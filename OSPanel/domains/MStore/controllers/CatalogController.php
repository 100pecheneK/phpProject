<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';
include_once ROOT . '/components/Pagination.php';

class CatalogController
{

    public function actionIndex($page = 1)
    {
        $categories = Category::getCategoryList();

        $products = Product::getAllProducts($page);

        $total_count = Product::getTotalProducts();
        $pagination = new Pagination($total_count, Product::SHOW_BY_DEFAULT, $page);

        require_once ROOT . '/views/catalog/index.php';

        return true;
    }

    public function actionCategory($categoryId, $page = 1)
    {
        $categories = Category::getCategoryList();

        $products = Product::getProductListByCategory($categoryId, $page);

        $total_count = Product::getTotalProductsInCategory($categoryId);
        $pagination = new Pagination($total_count, Product::SHOW_BY_DEFAULT, $page);

        require_once ROOT . '/views/catalog/category.php';

        return true;
    }
}
