<?php

class Sort
{
        public static function getSortStatus($order, $sort)
    {
        $string = 'Отсортировано по: ';
        switch ($order) {
            case 'id':
                $order = 'id';
                break;
            case 'code':
                $order = 'коду';
                break;
            case 'name':
                $order = 'имени';
                break;
            case 'price':
                $order = 'цене';
                break;
            case 'availability':
                $order = 'наличию';
                break;
            case 'is_new':
                $order = 'новизне';
                break;
            case 'is_recommended':
                $order = 'рекомендуемым';
                break;
            case 'status':
                $order = 'отображению';
                break;

            default:
                $order = 'id';
                break;
        }
        switch ($sort) {
            case 'ASC':
                $sort = 'сверху';
                break;
            case 'DESC':
                $sort = 'снизу';
                break;
            default:
                $sort = 'сверху';
                break;
        }
        $string .= $order . ' ' . $sort . '.';
        return $string;
    }
}
