<?php

/**  
 * query string => action directory
 * 
 */
return array(
    'product/([0-9]+)' => 'product/view/$1',

    'category/([0-9]+)' => 'catalog/category/$1',
    'category' => 'catalog/index',

    '' => 'site/index',
);
