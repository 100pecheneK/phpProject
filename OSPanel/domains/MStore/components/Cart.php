<?php

/**
 * Включает в себя ряд функций по работе с корзиной.
 */
class Cart
{
    /**
     * Добовляет один продукт в корзину.
     * @param int $id Идентификатор продукта.
     * @return int Количество продуктов в корзине.
     */
    public static function addProduct($id)
    {
        $id = intval($id);

        $productsInCart = array();

        if (isset($_SESSION['products']))
            $productsInCart = $_SESSION['products'];

        if (array_key_exists($id, $productsInCart))
            $productsInCart[$id]++;
        else
            $productsInCart[$id] = 1;

        $_SESSION['products'] = $productsInCart;

        return self::countPoducts();
    }
    /**
     * Удаляет продукт из корзины.
     * @param int $id Идентификатор продукта .
     */
    public static function delProduct($id)
    {
        unset($_SESSION['products'][$id]);
    }
/**
 * Подсчитывает продукты в корзине.
 * @return int Количество продуктов.
 */
    public static function countPoducts()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity)
                $count += $quantity;
            return $count;
        } else {
            return 0;
        }
    }
/**
 * Получает продукты, если такие имеются.
 * @return array Массив с продуктами вида id => count.
 */
    public static function getProducts()
    {
        if (isset($_SESSION['products']))
            return $_SESSION['products'];
        return false;
    }
/**
 * Получает стоимость продуктов в корзине.
 * @param array $product Массив или Боб продукта из БД.
 * @return int/float Стоимость продукта.
 */
    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();
        $totalPrice = 0;
        if ($productsInCart) {
            foreach ($products as $product) {
                $totalPrice += $product['price'] * $productsInCart[$product['id']];
            }
        }
        return $totalPrice;
    }
}
