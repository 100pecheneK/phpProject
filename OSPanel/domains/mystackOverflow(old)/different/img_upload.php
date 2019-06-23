<!-- Форма -->
<form action="user_settings.php?id=<?php echo $user['id'] ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleFormControlFile1">Аватар</label>
        <input type="file" class="form-control-file" name="user_file" id="exampleFormControlFile1">
    </div>
    <button class="btn btn-primary btn-block" type="submit" name="do_upload_img">Сохранить</button>

</form>



<?php
if (isset($data['do_upload_img'])) {

    // !Расположение по умолчанию c:/users/admin/documents/github/phpproject/ospanel/userdata/temp/

    // 1 - Размер файла превышает максимальное значение(100M)
    // 2 - Размер файла превышает заданное значение(100M)
    // 3 - Загружена только часть файла
    // 4 - Файл не загружен
    // 6 - В настройках сервера не указан временные каталог(сообщите об этом мне: <a href="https://vk.com/pechehka"></a>)
    // 7 - Запись файла не может быть выполнена(сообщите об этом мне: <a href="https://vk.com/pechehka"></a>)
    $file_errors = array();
    if ($_FILES['user_file']['error'] > 0) {
        switch ($_FILES['user_file']['error']) {
            case 1:
                $file_errors[] = 'Размер файла превышает максимальное значение(100M)';
                break;
            case 2:
                $file_errors[] = 'Размер файла превышает заданное значение(100M)';
                break;
            case 3:
                $file_errors[] = 'Загружена только часть файла';
                break;
            case 4:
                $file_errors[] = 'Файл не загружен';
                break;
            case 6:
                $file_errors[] = 'В настройках сервера не указан временные каталог(сообщите об этом мне: <a href="https://vk.com/pechehka"></a>)';
                break;
            case 7:
                $file_errors[] = 'Запись файла не может быть выполнена(сообщите об этом мне: <a href="https://vk.com/pechehka"></a>)';
                break;
        }
    }

    if (empty($file_errors)) {

        $upload_errors = array();

        $serverFileName = 'user_' . $_SESSION['logged_user']['id'] . '_img.jpeg';
        $upfile = '../images/users/' . $serverFileName;

        if (is_uploaded_file($_FILES['user_file']['tmp_name'])) {
            if (!move_uploaded_file($_FILES['user_file']['tmp_name'], $upfile)) {
                $upload_errors[] = 'error';
            }
        }
        if (empty($upload_errors)) {
            mysqli_query($connection, "UPDATE `users` SET `image`= '" . $serverFileName . "' WHERE `id` = " . (int)$user['id']);
            $upload_errors[] = 'no_error';
        }
    }
}

?>

<?php
// Вывод ошибок(вставлять после кнопки отправки в форме)
if (!empty($file_errors)) {
    ?>
    <div class="text-danger text-center mt-2">
        <h5 style="margin-bottom: 0px;">
            <?php echo $file_errors[0]; ?>
        </h5>
    </div>
<?php
} else if ($upload_errors[0] == 'no_error') {
    ?>
    <div class="text-success text-center mt-2">
        <h5 style="margin-bottom: 0px;">
            <?php echo 'Аватар загружен'; ?>
        </h5>
    </div>
<?php
} else if ($upload_errors[0] == 'error') {
    ?>
    <div class="text-danger text-center mt-2">
        <h5 style="margin-bottom: 0px;">
            <?php echo 'Ошибка'; ?>
        </h5>
    </div>
<?php
}
?>