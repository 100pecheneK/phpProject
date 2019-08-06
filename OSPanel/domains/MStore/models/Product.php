<?php

class Product
{
    const SHOW_BY_DEFAULT = 12;

    // Вернёт ассоциативный массив с указанным столбцом ключа и значения
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $products = R::getAll("SELECT id, price, sale, image, old_price, is_new FROM products WHERE status = 1 ORDER BY id DESC LIMIT $count");

        return $products;
    }

    public static function getAllProducts($page, $count = self::SHOW_BY_DEFAULT)
    {
        $page = intval($page);
        $offset = ($count * $page) - $count;

        $products = R::getAll("SELECT id, price, sale, image, old_price, is_new FROM products WHERE status = 1 ORDER BY id DESC LIMIT $count OFFSET $offset");

        return $products;
    }

    public static function getProductListByCategory($categoryId = false, $page = 1, $count = self::SHOW_BY_DEFAULT)
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($count * $page) - $count;

            // Получаем ids всех продуктов из данной категории
            $productsIds = R::findAll('categories_products', 'WHERE categories_id = ?', array($categoryId));
            $ids = array();
            foreach ($productsIds as $prodId) {
                $ids[] = $prodId->products_id;
            }

            if (!empty($ids)) {
                $products = R::getAll("SELECT id, price, sale, image, old_price, is_new FROM products WHERE id IN(" . R::genSlots($ids) . ") ORDER BY id DESC LIMIT $count OFFSET $offset", $ids);
                return $products;
            } else return false;
        }
    }

    public static function getProductById($id)
    {
        $product = R::findOne('products', 'WHERE id = ?', array($id));

        return $product;
    }

    public static function getTotalProductsInCategory($categoryId)
    {
        $total_count = R::count('categories_products', 'WHERE categories_id = ?', array($categoryId));
        return $total_count;
    }

    public static function getTotalProducts()
    {
        $total_count = R::count('products');
        return $total_count;
    }
}
