<?php

/**
 * Управляет продуктами в админ панели.
 */
class AdminProductController
{
    /**
     * READ.
     */
    public function actionIndex($order = 'id', $sort = 'ASC', $page = 1)
    {
        AdminBase::checkAdmin();

        $count_products = 20;
        $products = Product::getProductsListAdmin($page, $count_products, $order, $sort);
        $total_count = Product::getTotalProductsAdmin();
        $pagination = new Pagination($total_count, $count_products, $page);

        require_once ROOT . '/views/admin/product/read.php';
        // require_once ROOT . '/views/admin/product/tmp.php';
        return true;
    }
    /**
     * DELETE.
     */
    public function actionDelete($id)
    {
        AdminBase::checkAdmin();

        if (isset($_POST['submit'])) {
            Product::deleteProductById($id);
            header("Location: /admin/product");
        }

        require_once ROOT . '/views/admin/product/delete.php';
        return true;
    }
    /**
     * CREATE.
     */
    public function actionCreate()
    {
        AdminBase::checkAdmin();
        $categories = Category::getCategoryListAdmin();

        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['sale'] = $_POST['sale'];
            $options['price'] = $_POST['price'];
            $options['old_price'] = $_POST['old_price'];
            $options['brand'] = $_POST['brand'];
            $options['description'] = $_POST['description'];
            $options['categories_ids'] = $_POST['categories_ids'];
            $options['availability'] = $_POST['availability'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            $errors = false;

            // !Добавить валидацию

            if ($errors == false) {
                $id = Product::createProduct($options);
                if ($id) {
                    // Маленькое изображение
                    if (isset($_FILES['image'])) {
                        if (is_uploaded_file($_FILES['image']["tmp_name"])) {
                            move_uploaded_file($_FILES['image']["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/product/main_images/{$id}.png");
                        }
                    }
                    // Большое изображение
                    if (isset($_FILES['big_image'])) {
                        if (is_uploaded_file($_FILES['big_image']["tmp_name"])) {
                            move_uploaded_file($_FILES['big_image']["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/product/big_images/{$id}.jpg");
                        }
                    }
                }
                header('Location: /admin/product');
            }
        }

        require_once ROOT . '/views/admin/product/create.php';
        return true;
    }
    /**
     * UPDATE.
     */
    public function actionUpdate($id)
    {
        AdminBase::checkAdmin();
        $categories = Category::getCategoryListAdmin();
        $product = R::findOne('products', 'id = ?', array($id));
        $product_category_id = Product::getCategoryIdByProductId($id);

        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['sale'] = $_POST['sale'];
            $options['price'] = $_POST['price'];
            $options['old_price'] = $_POST['old_price'];
            $options['brand'] = $_POST['brand'];
            $options['description'] = $_POST['description'];
            $options['categories_ids'] = $_POST['categories_ids'];
            $options['availability'] = $_POST['availability'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            $errors = false;

            // !Добавить валидацию

            if ($errors == false) {
                Product::updateProduct($product, $options);
                // Маленькое изображение
                if (isset($_FILES['image'])) {
                    if (is_uploaded_file($_FILES['image']["tmp_name"])) {
                        move_uploaded_file($_FILES['image']["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/product/main_images/{$id}.png");
                    }
                }
                // Большое изображение
                if (isset($_FILES['big_image'])) {
                    if (is_uploaded_file($_FILES['big_image']["tmp_name"])) {
                        move_uploaded_file($_FILES['big_image']["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/product/big_images/{$id}.jpg");
                    }
                }
                header('Location: /admin/product');
            }
        }

        require_once ROOT . '/views/admin/product/update.php';
        return true;
    }
}
