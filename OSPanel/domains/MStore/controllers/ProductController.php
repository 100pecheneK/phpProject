<?php

include_once ROOT . '/models/Category.php';

class ProductController
{

    public function actionView($id)
    {
        
        $categories = Category::getCategoryList();
        
        require_once ROOT . '/views/product/view.php';

        return true;
    }
}
