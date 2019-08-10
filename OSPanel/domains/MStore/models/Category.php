<?php

class Category
{
    // Вернёт все активные категории
    public static function getCategoryList()
    {
        $catList = R::findAll('categories', "WHERE status = 1 ORDER BY `sort_id` ASC");

        return $catList;
    }

    /**
     * Вернёт все категории
     */
    public static function getCategoryListAdmin()
    {
        $catList = R::findAll('categories', "ORDER BY `id` ASC");

        return $catList;
    }

    public static function getCategoryListById($ids)
    {
        $catList = R::findAll('categories', 'WHERE id IN('.R::genSlots($ids).')', $ids);
        return $catList;
    }
}
