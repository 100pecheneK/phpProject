<?php
require "../includes/db.php";

if ($_SESSION['logged_user']) {
    $ans_id = intval($_POST['ans']);
    $usr_id = intval($_POST['usr']);
    // Запрос на наличие записи о лайке
    $like_check = R::count('answerslikes', 'WHERE `answer_id` = ? AND `user_id` = ?', array($ans_id, $usr_id));
    if ($like_check == 0) {
        // Создаём
        $like = R::dispense('answerslikes');
        $like->answer_id = $ans_id;
        $like->user_id = $usr_id;
        R::store($like);
        $isActive = True;
    } else {
        // Удаляем
        $del = R::findOne('answerslikes', 'WHERE `answer_id` = ? AND `user_id` = ?', array(
            $ans_id, $usr_id
        ));
        R::trash($del);
        $isActive = false;
    }
    $count = R::count('answerslikes', 'WHERE `answer_id` = ?', array($ans_id));

    $out = array(
        // Количество лайков
        'count' => $count,
        // Кнопка нажата?
        'isActive' => $isActive
    );
    // Это обязательно(так сказал человек в видео)
    header('Content-type: text/json; charset=utf-8');
    // это отправка JSON обратно
    echo json_encode($out);
} else {
    // Это пока что не работает
    header('Location: /login.php');
}
