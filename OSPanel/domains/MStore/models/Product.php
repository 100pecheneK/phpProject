<?php

class Product
{
    const SHOW_BY_DEFAULT = 10;

    // Вернёт ассоциативный массив с указанным столбцом ключа и значения
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $products = R::getAll("SELECT id, price, sale, image, old_price, is_new FROM products WHERE status = 1 ORDER BY id DESC LIMIT $count");

        return $products;
    }

    public static function getProductListByCategory($categoryId = false, $count = self::SHOW_BY_DEFAULT)
    {
        if ($categoryId) {
            // Получаем ids всех продуктов из данной категории
            $productsIds = R::findAll('categories_products', 'WHERE categories_id = ' . $categoryId);
            $ids = array();
            foreach ($productsIds as $prodId) {
                $ids[] = $prodId->products_id;
            }

            if (!empty($ids)) {
                $products = R::getAll("SELECT id, price, sale, image, old_price, is_new FROM products WHERE id IN(" . R::genSlots($ids) . ") ORDER BY id DESC LIMIT $count", $ids);
                return $products;
            } else return false;
        }
    }
}
