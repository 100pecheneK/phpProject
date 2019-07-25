<?php

class News
{
    // Вернёт одну новость с уникальным id
    public static function getNewsItemById($id)
    {        
        Db::getConnection();

        $newsItem = R::findOne('news', "`id` = ?" ,array($id));

        return $newsItem;
    }

    // Вернёт массив новостей
    public static function getNewsList()
    {
        Db::getConnection();

        $newsList = R::findAll('news', "ORDER BY `date` DESC LIMIT 10");

        return $newsList;
    }
}
