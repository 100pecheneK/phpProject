<?php include ROOT . '/views/layouts/admin/header_admin.php' ?>


<div class="row">
    <div class="col-12 px-5 py-3">

        <div class="row">
            <div class="col-12">
                <h3>Удалить товар: <?= $id ?></h3>
            </div>
            <div class="col-12">
                <h4>Вы действительно хотите удалить товар?</h3>
            </div>
            <div class="col-1">
                <form action="" method="POST">
                    <button type="submit" class="myB btn btn-warning rounded-0" name="submit">Удалить</button>
                </form>
            </div>
            <div class="col--1">
                <a href="<?= $_SERVER['HTTP_REFERER']?>" class="myB btn btn-warning rounded-0 text-left">Отмена</a>
            </div>
        </div>


    </div>
</div>


<?php include ROOT . '/views/layouts/admin/footer_admin.php' ?>