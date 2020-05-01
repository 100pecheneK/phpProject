<?php

/**
 * Содержит функции управления продуктом.
 */
class Product
{
    /**
     * Высчитывает сдвиг.
     * @param int $page Номер страницы.
     * @param int $count Количество товаров на странице.
     * @return int Сдвиг.
     */
    private static function getOffset($page, $count)
    {
        $page = intval($page);
        $offset = ($count * $page) - $count;
        return $offset;
    }
    /**
     * @var int Количество продуктов для отображения на одной странице 
     * по умолчанию.
     */
    const SHOW_BY_DEFAULT = 12;

    /**
     * @param int $count Количество последних продуктов.
     * @return array $products Последний продукты.
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $products = R::getAll("SELECT id, price, sale, old_price, is_new FROM products WHERE status = 1 ORDER BY id DESC LIMIT $count");

        return $products;
    }
    /**
     * @param int $page Номер страницы.
     * @param int $count Количество продуктов.
     * @return array $products Продукты.
     */
    public static function getAllProducts($page, $count = self::SHOW_BY_DEFAULT)
    {
        $offset = self::getOffset($page, $count);

        $products = R::getAll("SELECT id, price, sale, old_price, is_new FROM products WHERE status = 1 ORDER BY id DESC LIMIT $count OFFSET $offset");

        return $products;
    }
    /**
     * Полчает не полную информацию о продукте.
     * @param int $page Номер страницы.
     * @param int $count Количество продуктов на странице.
     * @return array Продукты.
     */
    public static function getProductsList($page, $count = self::SHOW_BY_DEFAULT)
    {
        $offset = self::getOffset($page, $count);

        $products = R::getAll("SELECT id, name, code, price FROM products ORDER BY id ASC LIMIT $count OFFSET $offset");
        return $products;
    }
    /**
     * Получает полную информацию о продукте.
     * @param int $page Номер страницы.
     * @param int $count Количество продуктов на странице.
     * @param string $order Столбец сортировки.
     * @param string $sort ASC/DESC.
     * @return array Продукты.
     */
    public static function getProductsListAdmin($page, $count = self::SHOW_BY_DEFAULT, $order, $sort)
    {
        $offset = self::getOffset($page, $count);

        $products = R::getAll("SELECT id, name, code, price, is_new, is_recommended, status, availability FROM products ORDER BY " . $order . " " . $sort . " LIMIT ? OFFSET ?", array(
            $count,
            $offset
        ));
        return $products;
    }
    /**
     * Получает продукты для к арусели.
     * @return array Продукты с is_recommended = 1.
     */
    public static function getRecommendedProducts()
    {
        $products = R::getAll("SELECT id, price, sale, old_price, is_new FROM products WHERE is_recommended = 1 AND status = 1 ORDER BY id DESC");
        return $products;
    }
    /**
     * Получает продукты отдной категории.
     * @param mixed $categoryId Идентификатор категории.
     * @param int $page Номер страницы.
     * @param int $count Количество продуктов на странице.
     */
    public static function getProductListByCategory($categoryId = false, $page = 1, $count = self::SHOW_BY_DEFAULT)
    {
        if ($categoryId) {

            $offset = self::getOffset($page, $count);

            // Получаем ids всех продуктов из данной категории.
            $productsIds = R::findAll('categories_products', 'WHERE categories_id = ?', array($categoryId));
            $ids = array();
            foreach ($productsIds as $prodId) {
                $ids[] = $prodId->products_id;
            }

            if (!empty($ids)) {
                $products = R::getAll("SELECT id, price, sale, old_price, is_new FROM products WHERE status = 1 AND id IN(" . R::genSlots($ids) . ") ORDER BY id DESC LIMIT $count OFFSET $offset", $ids);
                return $products;
            } else return false;
        }
    }
    /**
     * Получает боб продукта.
     * @param int $id Идентификатор продукта.
     * @return bean Боб продукта.
     */
    public static function getProductById($id)
    {
        $product = R::findOne('products', 'WHERE id = ?', array($id));

        return $product;
    }
    /**
     * Получает продукты.
     * @param int $ids Идентификаторы продуктов.
     * @return array Продукты.
     */
    public static function getProductsByIds($ids)
    {
        $products = R::getAll("SELECT id, name, price FROM products WHERE status = 1 AND id IN(" . R::genSlots($ids) . ")", $ids);
        return $products;
    }
    /**
     * @param int $categoryId.
     * @return int Количество продуктов в категории.
     */
    public static function getTotalProductsInCategory($categoryId)
    {
        $total_count = R::count('categories_products', 'WHERE categories_id = ?', array($categoryId));
        return $total_count;
    }
    /**
     * @return int Количество всех продуктов status = 1.
     */
    public static function getTotalProducts()
    {
        $total_count = R::count('products', 'WHERE status = 1');
        return $total_count;
    }
    /**
     * @return int Количество всех продуктов.
     */
    public static function getTotalProductsAdmin()
    {
        $total_count = R::count('products');
        return $total_count;
    }
    /**
     * Удаляет продукт.
     * @param $id.
     */
    public static function deleteProductById($id)
    {
        R::exec('DELETE FROM `products` WHERE `id` = ?', array($id));
        return true;
    }
    /**
     * Получает ids категорий желаемого продукта.
     * @param int $productId Идентификатор продукта.
     * @return array Идентификаторы категорий продукта.
     */
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
     * @param array $options Опции продукта.
     * @return int Id созданного продукта.
     */
    public static function createProduct($options)
    {
        $product = R::dispense('products');
        $product->name = $options['name'];
        $product->code = $options['code'];
        $product->sale = $options['sale'];
        $product->price = $options['price'];
        if ($options['sale'])
            $product->old_price = $options['old_price'];
        $product->brand = $options['brand'];
        $product->description = $options['description'];
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
    /**
     * @param bean $product Боб продукта.
     * @param array $options Опции продукта.
     * @return int Id созданного продукта.
     */
    public static function updateProduct($product, $options)
    {
        $product->name = $options['name'];
        $product->code = $options['code'];
        $product->sale = $options['sale'];
        $product->price = $options['price'];
        if ($options['sale'])
            $product->old_price = $options['old_price'];
        $product->brand = $options['brand'];
        $product->description = $options['description'];
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

        R::store($product);
    }
    /**
     * @param int $id Идентификатор продукта.
     * @return string Путь до маленького изображения.
     */
    public static function getMainImage($id)
    {
        $noImage = 'no-image.jpg';
        $path = '/upload/images/product/';

        $pathToProductImage = $path . 'main_images/' . $id . '.png';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage))
            return $pathToProductImage;
        return $path . $noImage;
    }
    /**
     * @param int $id Идентификатор продукта.
     * @return string Путь до большого изображения.
     */
    public static function getBigImage($id)
    {
        $noImage = 'no-image.jpg';
        $path = '/upload/images/product/';

        $pathToProductImage = $path . 'big_images/' . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage))
            return $pathToProductImage;
        return $path . $noImage;
    }
}
