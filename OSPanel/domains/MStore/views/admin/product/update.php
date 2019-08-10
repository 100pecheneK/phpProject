<?php include ROOT . '/views/layouts/header_admin.php' ?>

<div class="container p-0 p-md-3">
    <div class="my-0 my-sm-3 bg-white shadow-sm">
        <div class="row">
            <div class="col-12">
                <a href="/admin/product/" class="myB btn btn-block btn-warning rounded-0"><i class="fas fa-undo"></i> Назад</a>
            </div>
            <?php if ($product) : ?>
                <div class="col px-5 py-3">
                    <form action="" method="POST">
                        <!-- name -->
                        <div class="form-group row">
                            <label for="name" class="col-3 col-form-label">Название товара</label>
                            <div class="col">
                                <input type="text" name="name" class="form-control" value="<?= $product->name ?>" placeholder="Название товара">
                            </div>
                        </div>
                        <!-- code -->
                        <div class="form-group row">
                            <label for="code" class="col-3 col-form-label">Код товара</label>
                            <div class="col-2">
                                <input type="text" name="code" class="form-control" value="<?= $product->code ?>" placeholder="Код товара">
                            </div>
                        </div>
                        <!-- price -->
                        <div class="form-group row">
                            <label for="price" class="col-3 col-form-label">Цена</label>
                            <div class="col-3">
                                <input type="text" name="price" class="form-control" value="<?= $product->price ?>" placeholder="Цена &#x20bd;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sale" class="col-3 col-form-label">Скидка</label>
                            <div class="col-2">
                                <select class="form-control" name="sale">
                                    <option value="1" <?php if ($product->sale) echo 'selected="selected"' ?>>Да</option>
                                    <option value="0" <?php if (!$product->sale) echo 'selected="selected"' ?>>Нет</option>
                                </select>
                            </div>
                        </div>
                        <!-- old_price -->
                        <div class="form-group row">
                            <label for="old_price" class="col-3 col-form-label">Старая цена (при наличии скидки)</label>
                            <div class="col-3">
                                <input type="text" name="old_price" class="form-control" value="<?php if ($product->sale) echo "$product->old_price"; else echo 0?>" placeholder="Старая цена &#x20bd;">
                            </div>
                        </div>
                        <!-- brand -->
                        <div class="form-group row">
                            <label for="brand" class="col-3 col-form-label">Фирма</label>
                            <div class="col">
                                <input type="text" name="brand" class="form-control" value="<?= $product->brand ?>" placeholder="Фирма">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-3 col-form-label">Описание товара</label>
                            <div class="col">
                                <textarea class="form-control" name="description" rows="3"><?= $product->description ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categories_ids" class="col-3 col-form-label">Категории</label>
                            <div class="col-5">
                                <select multiple class="form-control" name="categories_ids[]">
                                    <option value="null" <?php if (!$product_category_id) echo 'selected="selected"' ?>>Без категории</option>
                                    <?php foreach ($categories as $category) : ?>
                                        <option <?php
                                                if ($product_category_id) {
                                                    foreach ($product_category_id as $pCI) {
                                                        if ($pCI == $category->id)
                                                            echo 'selected="selected"';
                                                    }
                                                } ?> value="<?= $category->id ?>"><?= $category->name ?></option>
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
                                    <option value="1" <?php if ($product->availability) echo 'selected="selected"' ?>>Да</option>
                                    <option value="0" <?php if (!$product->availability) echo 'selected="selected"' ?>>Нет</option>
                                </select>
                            </div>
                        </div>
                        <!-- is_new -->
                        <div class="form-group row">
                            <label for="is_new" class="col-3 col-form-label">Новинка</label>
                            <div class="col-2">
                                <select class="form-control" name="is_new">
                                    <option value="1" <?php if ($product->is_new) echo 'selected="selected"' ?>>Да</option>
                                    <option value="0" <?php if (!$product->is_new) echo 'selected="selected"' ?>>Нет</option>
                                </select>
                            </div>
                        </div>
                        <!-- is_recommended -->
                        <div class="form-group row">
                            <label for="is_recommended" class="col-3 col-form-label">Рекомендуемый</label>
                            <div class="col-2">
                                <select class="form-control" name="is_recommended">
                                    <option value="1" <?php if ($product->is_recommended) echo 'selected="selected"' ?>>Да</option>
                                    <option value="0" <?php if (!$product->is_recommended) echo 'selected="selected"' ?>>Нет</option>
                                </select>
                            </div>
                        </div>
                        <!-- status -->
                        <div class="form-group row">
                            <label for="status" class="col-3 col-form-label">Отображение</label>
                            <div class="col-2">
                                <select class="form-control" name="status">
                                    <option value="1" <?php if ($product->status) echo 'selected="selected"' ?>>Виден</option>
                                    <option value="0" <?php if (!$product->status) echo 'selected="selected"' ?>>Скрыт</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="myB btn btn-warning rounded-0">Сохранить изменения</button>

                    </form>
                </div>
            <?php else : ?>
                <h3 class="text-center w-100">Товар не найден</h3>
            <?php endif ?>
        </div>


    </div>

</div>


<?php include ROOT . '/views/layouts/footer_admin.php' ?>