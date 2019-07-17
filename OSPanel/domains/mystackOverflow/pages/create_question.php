<?php
require "../includes/db.php";

if (isset($_SESSION['logged_user'])) {
    $data = $_POST;
    // iconv_strlen($data['login']) > 1000
    if (isset($data['do_create_quest'])) {
        $max_len = '';
        $title = strip_tags($data['title']);
        $text = strip_tags($data['text']);
        if (iconv_strlen($title) < 200) {
            $id = $_SESSION['logged_user']['id'];
            $user = R::findOne('users', "`id` = ?", array($id));

            $question = R::dispense('questions');
            $question->title = $title;
            $question->text = $text;

            $user->ownQuestionList[] = $question;
            $id = R::store($user);

            if (isset($data['tags'])) {
                $selTag = $data['tags'];
                $addTag = array();

                $tags = R::findAll('tags');
                foreach ($tags as $tag) {
                    foreach ($selTag as $st) {
                        if ($tag->name == $st) {
                            $addTag[] = $tag;
                        }
                    }
                }
                foreach ($addTag as $at) {
                    $question->sharedTagsList[] = $at;
                }

                R::store($question);
            }
            header('Location: /');
        } else {
            $max_len = 'yes';
        }
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
    <link rel="stylesheet" href="/style/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="/style/my.css">
    <link rel="stylesheet" href="/style/particles/particles.css">

    <title>Создать вопрос</title>

    <style>

    </style>
</head>

<body class="bg-<?php if (5 < date('G') && date('G') < 20) echo 'light';
                else echo 'dark' ?>">
    <!-- Партиклы -->
    <div id="particles-js"></div>
    <div id="page-wrapper">
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
                                    <form action="create_question.php" method="POST" class="needs-validation" novalidate>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Кратко изложите суть вопроса</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="<?php echo $title ?>" required>
                                            <div class="invalid-feedback">
                                                Это поле обязательно
                                            </div>
                                            <?php
                                            if ($max_len == 'yes') { ?>
                                                <div class="text-danger text-center mt-2">
                                                    <h5 style="margin-bottom: 0px;">
                                                        Заголовок слишком длинный (более 200 символов)
                                                    </h5>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Распишите вопрос подробнее</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='text' required><?php echo $text ?></textarea>
                                            <div class="invalid-feedback">
                                                Это поле обязательно
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Тэги</label>
                                            <select class="form-control" id="exampleFormControlSelect1" data-live-search="true" multiple name="tags[]">
                                                <?php
                                                $tags = R::findAll('tags');
                                                foreach ($tags as $tag) {
                                                    ?>
                                                    <option value="<?php echo $tag->name ?>"><?php echo $tag->name ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <small class="d-block text-right mt-3">
                                            <button class="btn btn-primary" type="submit" name="do_create_quest">Задать вопрос</button>
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
        <!-- Партиклы -->
    </div>
    <!-- Bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="/style/js/bootstrap.min.js"></script>
    <script src="/style/js/jQuery.js"></script>
    <script src="/style/particles/particles.js"></script>
    <script src="/style/particles/my.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>