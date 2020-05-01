<?php

/**
 * Управляет функциями корзины.
 */
class CartController
{
    /**
     * Отображает страницу корзины.
     */
    public function actionIndex()
    {
        $categories = Category::getCategoryList();

        $productsInCart = false;

        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once ROOT . '/views/cart/index.php';

        return true;
    }
    /**
     * Асинхронно Добавляет продукт в корзину.
     * @param int $id Идентификатор продукта
     */
    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);

        return true;
    }
    /**
     * Удаляет продукт из корзины.
     * @param int $id Идентификатор продукта
     */
    public function actionDel($id)
    {
        Cart::delProduct($id);

        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        return true;
    }
    /**
     * (Не используется, т.к. есть actionAddAjax).
     * Синхронно Добавляет продукт в корзину.
     * @param int $id Идентификатор продукта
     */
    public function actionAdd($id)
    {
        Cart::addProduct($id);

        $referer = '/cart';
        header("Location: $referer");

        return true;
    }
}
