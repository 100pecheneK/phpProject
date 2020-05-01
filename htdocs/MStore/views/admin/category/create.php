<?php include ROOT . '/views/layouts/admin/header_admin.php' ?>
<div class="row">
    <div class="col-12 px-5 py-3">
        <form action="" method="POST">
            <!-- name -->
            <div class="form-group row">
                <label for="name" class="col-3 col-form-label">Название категории</label>
                <div class="col">
                    <input type="text" name="name" class="form-control" placeholder="Название категории">
                </div>
            </div>
            <!-- status -->
            <div class="form-group row">
                <label for="status" class="col-3 col-form-label">Отображение</label>
                <div class="col-2">
                    <select class="form-control" name="status">
                        <option value="1" selected="selected">Видна</option>
                        <option value="0">Скрыта</option>
                    </select>
                </div>
            </div>
            <button type="submit" name="submit" class="myB btn btn-warning rounded-0">Добавить</button>

        </form>
    </div>
</div>

<?php include ROOT . '/views/layouts/admin/footer_admin.php' ?>