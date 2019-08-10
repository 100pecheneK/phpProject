<?php

class Cart
{
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

    public static function delProduct($id)
    {
        unset($_SESSION['products'][$id]);
    }

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

    public static function getProducts()
    {
        if (isset($_SESSION['products']))
            return $_SESSION['products'];
        return false;
    }

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
