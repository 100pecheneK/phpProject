<?php
require "../includes/db.php";

if (isset($_SESSION['logged_user'])) {
    $data = $_POST;

    if (isset($data['do_create_quest'])) {
        $id = $_SESSION['logged_user']['id'];
        $user = R::findOne('users', "`id` = ?", array($id));

        $questions = R::dispense('questions');
        $questions->title = $data['title'];
        $questions->text = $data['text'];

        $user->ownQuestList[] = $questions;
        R::store($user);
    }
} else {
    header('Location: /signup.php');
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 4 -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- <link href="/style/chosen/bootstrap-chosen.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="/style/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="/style/bootstrap-select-1.13.9/dist/css/bootstrap-select.css">
    <link rel="stylesheet" href="/style/my.css">

    <title>Создать вопрос</title>

    <style>
        
    </style>
</head>

<body class="bg-light">
    <!-- Навбар -->
    <?php include "../includes/nav.php" ?>
    <!-- /Навбар -->
    <!-- Главный блок -->
    <main role="main" class="container mt-4">
        <div class="shadow p-3 mb-5 bg-white rounded">
            <h6 class="border-bottom border-gray pb-2 mb-0">Задайте свой вопрос</h6>

            <div class="media text-muted pt-3">
                <div class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <form action="create_question.php" method="POST">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Кратко изложите суть вопроса</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Распишите вопрос подробнее</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='text'></textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Тэги</label>
                                        <select class="selectpicker" data-live-search="true" multiple>
                                            <?php
                                            for($i=0; $i<20; $i++){
                                                echo '<option>Тэг номер ' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>                                   
                                    <small class="d-block text-right mt-3">
                                        <button class="btn btn-primary" type="submit" name="do_create_quest">Задавть вопрос</button>
                                    </small>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </main>
    <!-- /Главный блок -->
    <!-- Футер -->
    <?php include "../includes/foot.php" ?>
    <!-- /Футер -->

    <!-- Bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- Latest compiled and minified JavaScript -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script> -->
    <script src="/style/my.js"></script>
</body>

</html>