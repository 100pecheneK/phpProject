<?php

class Product
{
    const SHOW_BY_DEFAULT = 10;

    // Вернёт ассоциативный массив с указанным столбцом ключа и значения
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        

        $products = R::getAll("SELECT id , code, price, sale, image, old_price, is_new FROM products WHERE status = 1 ORDER BY id DESC LIMIT $count");

        return $products;
    }
}
