<?php

/**
 * Содержит функции управления категориями.
 */
class Category
{
    /**
     * @return array Все категории со status = 1
     */
    public static function getCategoryList()
    {
        $catList = R::findAll('categories', "WHERE status = 1 ORDER BY id ASC");

        return $catList;
    }

    /**
     * @return array Все категории
     */
    public static function getCategoryListAdmin()
    {
        $catList = R::findAll('categories', "ORDER BY `id` ASC");

        return $catList;
    }
    /**
     * @param mixed $ids Идентификаторы категорий
     * @return array Запрошенные категории
     */
    public static function getCategoryListById($ids)
    {
        $catList = R::findAll('categories', 'WHERE id IN(' . R::genSlots($ids) . ')', $ids);
        return $catList;
    }
    /**
     * @param int $id Идентификатор категории
     * @return array Запрошенную категорию
     */
    public static function deleteCategoryById($id)
    {
        R::exec('DELETE FROM `categories` WHERE `id` = ?', array($id));
        R::exec('DELETE FROM `categories_products` WHERE `categories_id` = ?', array($id));
        return true;
    }
    /**
     * Создаёт категорию.
     * @param array $options Поля категории
     */
    public static function createCategory($options)
    {
        $category = R::dispense('categories');
        $category->name = $options['name'];
        $category->status = $options['status'];
        R::store($category);
    }
    /**
     * Обновляет категорию.
     * @param bean $category Боб категории
     * @param array $options Поля категории
     */
    public static function updateCategory($category, $options)
    {
        $category->name = $options['name'];
        $category->status = $options['status'];
        R::store($category);
    }
}
