<?php
function diffphp($myDate)
{
    $datetime1 = new DateTime($myDate);
    $datetime2 = new DateTime();
    $interval = $datetime1->diff($datetime2);
    $inter = '';
    if ($interval->y != 0) {
        $inter = $interval->format('%y лет');
    }
    if ($interval->m != 0) {
        $inter = $inter . ' ' . $interval->format('%m месяцев');
    }
    if ($interval->d != 0) {
        $inter = $inter . ' ' . $interval->format('%d дней');
    }
    if ($interval->h != 0) {
        $inter = $inter . ' ' . $interval->format('%h часов');
    }
    if ($interval->i != 0) {
        $inter = $inter . ' ' . $interval->format('%i минут');
    }
    if ($interval->i == 0) {
        $inter = $inter . ' ' . $interval->format('%s секунд');
    }
    return $inter;
}
