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

    public static function getProductsList($page, $count = self::SHOW_BY_DEFAULT)
    {
        $page = intval($page);
        $offset = ($count * $page) - $count;

        $products = R::getAll("SELECT id, name, code, price FROM products ORDER BY id ASC LIMIT $count OFFSET $offset");
        return $products;
    }


    public static function getProductsListAdmin($page, $count = self::SHOW_BY_DEFAULT, $order, $sort)
    {
        $page = intval($page);
        $offset = ($count * $page) - $count;
        $products = R::getAll("SELECT id, name, code, price, is_new, is_recommended, status, availability FROM products ORDER BY " . $order . " " . $sort . " LIMIT ? OFFSET ?", array(
            $count,
            $offset
        ));
        return $products;
    }

    public static function getRecommendedProducts()
    {
        $products = R::getAll("SELECT id, price, sale, big_image, old_price, is_new FROM products WHERE is_recommended = 1 AND status = 1 ORDER BY id DESC");
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
                $products = R::getAll("SELECT id, price, sale, image, old_price, is_new FROM products WHERE status = 1 AND id IN(" . R::genSlots($ids) . ") ORDER BY id DESC LIMIT $count OFFSET $offset", $ids);
                return $products;
            } else return false;
        }
    }

    public static function getProductById($id)
    {
        $product = R::findOne('products', 'WHERE id = ?', array($id));

        return $product;
    }

    public static function getProductsByIds($ids)
    {
        $products = R::getAll("SELECT id, name, price FROM products WHERE status = 1 AND id IN(" . R::genSlots($ids) . ")", $ids);
        return $products;
    }

    public static function getTotalProductsInCategory($categoryId)
    {
        $total_count = R::count('categories_products', 'WHERE categories_id = ?', array($categoryId));
        return $total_count;
    }

    public static function getTotalProducts()
    {
        $total_count = R::count('products', 'WHERE status = 1');
        return $total_count;
    }

    public static function getTotalProductsAdmin()
    {
        $total_count = R::count('products');
        return $total_count;
    }

    public static function deleteProductById($id)
    {
        R::exec('DELETE FROM `products` WHERE `id` = ?', array($id));
        return true;
    }

    public static function getCategoryIdByProductId($productId)
    {
        $category = R::findAll('categories_products', 'WHERE products_id = ?', array($productId));
        if ($category) {
            foreach ($category as $cat) {
                $categoryId[] = $cat->categories_id;
            }
            return $categoryId;
        }
    }
    /**
     * Вернёт id созданного продукта
     */
    public static function createProduct($options)
    {
        $product = R::dispense('products');
        $product->name = $options['name'];
        $product->code = $options['code'];
        $product->sale = $options['sale'];
        $product->price = $options['price'];
        $product->old_price = $options['old_price'];
        $product->brand = $options['brand'];
        $product->description = $options['description'];
        $product->image = $options['image'];
        $product->big_image = $options['big_image'];
        $product->availability = $options['availability'];
        $product->is_new = $options['is_new'];
        $product->is_recommended = $options['is_recommended'];
        $product->status = $options['status'];
        if (!$options['categories_ids'] == null) {
            $categoryList = Category::getCategoryListById($options['categories_ids']);
            foreach ($categoryList as $category) {
                $product->sharedCategoryList[] = $category;
            }
        }
        $id = R::store($product);
        return $id;
    }

    public static function updateProduct($product, $options)
    {
        $product->name = $options['name'];
        $product->code = $options['code'];
        $product->sale = $options['sale'];
        $product->price = $options['price'];
        $product->old_price = $options['old_price'];
        $product->brand = $options['brand'];
        $product->description = $options['description'];
        $product->image = $options['image'];
        $product->big_image = $options['big_image'];
        $product->availability = $options['availability'];
        $product->is_new = $options['is_new'];
        $product->is_recommended = $options['is_recommended'];
        $product->status = $options['status'];
        if (!$options['categories_ids'] == null) {
            $categoryList = Category::getCategoryListById($options['categories_ids']);
            foreach ($categoryList as $category) {
                $product->sharedCategoryList[] = $category;
            }
        }
        $id = R::store($product);
        return $id;
    }
}
