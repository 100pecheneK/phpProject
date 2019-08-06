<?php

/**  
 * query string => action directory
 * example/index/([0-9]+) => example/index/$1 // actionIndex in ExampleController
 * 
 */
return array(
    'product/([0-9]+)' => 'product/view/$1',

    'catalog/page-([0-9]+)' => 'catalog/index/$1',
    'catalog' => 'catalog/index',

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',

    'account/settings' => 'account/settings',
    'account' => 'account/index',

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'contact' => 'site/contact',

    '' => 'site/index',
);
