<?php

class Category
{
    // Вернёт все категории
    public static function getCategoryList()
    {        
        

        $catList = R::findAll('categories', "ORDER BY `sort_id` ASC");

        return $catList;
    }
}
