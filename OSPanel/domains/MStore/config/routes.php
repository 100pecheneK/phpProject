<?php

/**  
 * query string => action directory
 * example/index/([0-9]+) => example/index/$1 // actionIndex in ExampleController
 * 
 */
return array(
    
    // Каталог
    'catalog/page-([0-9]+)' => 'catalog/index/$1',
    'catalog' => 'catalog/index',
    // Категории
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',
    // Пользователь
    'account/settings' => 'account/settings',
    'account' => 'account/index',
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    // Корзина
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/del/([0-9]+)' => 'cart/del/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart' => 'cart/index',
    // Админ панель категории
    'admin/category/create' => 'admincategory/create',
    'admin/category/update/([0-9]+)' => 'admincategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'admincategory/delete/$1',
    'admin/category' => 'adminProduct/index',
    // Админ панель продукты
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',

    'admin/product/([a-z]+)/([A-Z]+)/page-([0-9]+)' => 'adminProduct/index/$1/$2/$3',
    'admin/product/([a-z]+)/([A-Z]+)' => 'adminProduct/index/$1/$2',
    'admin/product/page-([0-9]+)' => 'adminProduct/index/id/ASC/$1',
    'admin/product' => 'adminProduct/index',
    
    // Админ панель
    'admin' => 'admin/index',
    // Товар
    'product/([0-9]+)' => 'product/view/$1',
    // О сайте
    'contact' => 'site/contact',
    // Сайт
    '' => 'site/index',
);
