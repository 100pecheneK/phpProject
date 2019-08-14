<?php include ROOT . '/views/layouts/admin/header_admin.php' ?>
<div class="row">
    <div class="col-12 px-5 py-3">
        <form action="#" method="POST" enctype="multipart/form-data">
            <!-- name -->
            <div class="form-group row">
                <label for="name" class="col-3 col-form-label">Название товара</label>
                <div class="col">
                    <input type="text" name="name" class="form-control" placeholder="Название товара">
                </div>
            </div>
            <!-- code -->
            <div class="form-group row">
                <label for="code" class="col-3 col-form-label">Код товара</label>
                <div class="col-2">
                    <input type="text" name="code" class="form-control" placeholder="Код товара">
                </div>
            </div>
            <!-- price -->
            <div class="form-group row">
                <label for="price" class="col-3 col-form-label">Цена</label>
                <div class="col-3">
                    <input type="text" name="price" class="form-control" placeholder="Цена &#x20bd;">
                </div>
            </div>
            <div class="form-group row">
                <label for="sale" class="col-3 col-form-label">Скидка</label>
                <div class="col-2">
                    <select class="form-control" name="sale">
                        <option value="1">Да</option>
                        <option value="0" selected="selected">Нет</option>
                    </select>
                </div>
            </div>
            <!-- old_price -->
            <div class="form-group row">
                <label for="old_price" class="col-3 col-form-label">Старая цена (при наличии скидки)</label>
                <div class="col-3">
                    <input type="text" name="old_price" class="form-control" placeholder="Старая цена &#x20bd;">
                </div>
            </div>
            <!-- brand -->
            <div class="form-group row">
                <label for="brand" class="col-3 col-form-label">Фирма</label>
                <div class="col">
                    <input type="text" name="brand" class="form-control" placeholder="Фирма">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-3 col-form-label">Описание товара</label>
                <div class="col">
                    <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="categories_ids" class="col-3 col-form-label">Категории</label>
                <div class="col-5">
                    <select multiple class="form-control" name="categories_ids[]">
                        <option value="null" selected="selected">Без категории</option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <!-- image -->
            <div class="form-group row">
                <label for="image" class="col-3 col-form-label">Маленькое изображение</label>
                <div class="col">
                    <input type="file" class="form-control-file" name="image">
                </div>
            </div>
            <!-- big_image -->
            <div class="form-group row">
                <label for="big_image" class="col-3 col-form-label">Большое изображение</label>
                <div class="col">
                    <input type="file" class="form-control-file" name="big_image">
                </div>
            </div>
            <!-- availability -->
            <div class="form-group row">
                <label for="availability" class="col-3 col-form-label">Наличие товара</label>
                <div class="col-2">
                    <select class="form-control" name="availability">
                        <option value="1" selected="selected">Да</option>
                        <option value="0">Нет</option>
                    </select>
                </div>
            </div>
            <!-- is_new -->
            <div class="form-group row">
                <label for="is_new" class="col-3 col-form-label">Новинка</label>
                <div class="col-2">
                    <select class="form-control" name="is_new">
                        <option value="1" selected="selected">Да</option>
                        <option value="0">Нет</option>
                    </select>
                </div>
            </div>
            <!-- is_recomended -->
            <div class="form-group row">
                <label for="is_recomended" class="col-3 col-form-label">Рекомендуемый</label>
                <div class="col-2">
                    <select class="form-control" name="is_recommended">
                        <option value="1">Да</option>
                        <option value="0" selected="selected">Нет</option>
                    </select>
                </div>
            </div>
            <!-- status -->
            <div class="form-group row">
                <label for="status" class="col-3 col-form-label">Отображение</label>
                <div class="col-2">
                    <select class="form-control" name="status">
                        <option value="1" selected="selected">Виден</option>
                        <option value="0">Скрыт</option>
                    </select>
                </div>
            </div>
            <button type="submit" name="submit" class="myB btn btn-warning rounded-0">Добавить</button>

        </form>
    </div>
</div>

<?php include ROOT . '/views/layouts/admin/footer_admin.php' ?>