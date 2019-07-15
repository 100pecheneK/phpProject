<?php
require "../includes/db.php";

if ($_SESSION['logged_user']) {
    $ans_id = intval($_POST['ans']);
    $usr_id = intval($_POST['usr']);
    $like_check = R::count('answerslikes', 'WHERE `answer_id` = ? AND `user_id` = ?', array($ans_id, $usr_id));
    if ($like_check == 0) {
        $like = R::dispense('answerslikes');
        $like->answer_id = $ans_id;
        $like->user_id = $usr_id;
        R::store($like);
        $isActive = True;
    } else {
        $del = R::findOne('answerslikes', 'WHERE `answer_id` = ? AND `user_id` = ?', array(
            $ans_id, $usr_id
        ));
        R::trash($del);
        $isActive = false;
    }
    $count = R::count('answerslikes', 'WHERE `answer_id` = ?', array($ans_id));

    $out = array(
        'count' => $count,
        'isActive' => $isActive
    );

    header('Content-type: text/json; charset=utf-8');
    echo json_encode($out);
} else {
    header('Location: /login.php');
}
