<?php include ROOT . '/views/layouts/header_admin.php' ?>

<div class="container p-0 p-md-3">
    <div class="my-0 my-sm-3 bg-white shadow-sm">

        <div class="row">
        <div class="col-12">
                <a href="/admin/product/" class="myB btn btn-block btn-warning rounded-0"><i class="fas fa-undo"></i> Назад</a>
            </div>
            <div class="col px-5 py-3">
                <h3>Удалить товар: <?= $id ?></h3>
                <h4>Вы действительно хотите удалить товар?</h3>
                    <form action="" method="POST">
                        <button type="submit" class="myB btn btn-warning rounded-0" name="submit">Удалить</button>
                    </form>
            </div>
        </div>

    </div>

</div>


<?php include ROOT . '/views/layouts/footer_admin.php' ?>