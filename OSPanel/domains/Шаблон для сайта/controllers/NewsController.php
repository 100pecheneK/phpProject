<?php

include_once ROOT . '/models/News.php';

class NewsController
{ 
    public function actionIndex()
    {
        $newsList = News::getNewsList();
        
        echo '<pre>';
        print_r($newsList);

        return true;
    }
    public function actionView($id)
    {
        echo 'Просмотр одной новости';
        
        $newsList = News::getNewsItemById($id);

        echo '<pre>';
        print_r($newsList);

        return true;
    }
}
