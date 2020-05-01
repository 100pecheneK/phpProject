<?php
/**
 * Создает строку состояния сортировки.
 */
class Sort
{
    /**
     * Создает строку состояния сортировки.
     * @param string $order Столбец
     * @param string $sort Параметр ASC/DESC
     * @return string Строка состояния: Отсортировано по id сверху
     */
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
            case 'role':
                $order = 'роли';
                break;
            case 'email':
                $order = 'Email';
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
