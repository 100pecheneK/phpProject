<?php
/**
 * Управляет функциями каталога
 */
class CatalogController
{
/**
 * Отображает страницу с товарами из всех категорий.
 */
    public function actionIndex($page = 1)
    {
        $categories = Category::getCategoryList();

        $products = Product::getAllProducts($page);

        $total_count = Product::getTotalProducts();
        $pagination = new Pagination($total_count, Product::SHOW_BY_DEFAULT, $page);

        require_once ROOT . '/views/catalog/index.php';

        return true;
    }
/**
 * Отображает страницу с товарами из выбранной категории.
 * @param int $categoryId Идентификатор категории
 * @param int $page Номер страницы
 */
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
