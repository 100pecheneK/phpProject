<div class="container">
    <div class="row">
        <?php if ($products) : ?>
            <?php foreach ($products as $p) : ?>
                <div class="col-6 col-lg-4 col-xl-3 mb-4">
                    <div class="card rounded-0">
                        <div class="img-wrap">
                            <img src="/template/images/small/<?= $p['image'] ?>" class="card-img-top" alt="...">
                            <span class="img-wrap-span border border-warning text-warning p-1 text-center bg-dark-trans">
                                <?php if ($p['is_new']) : ?>
                                    <h4>Новинка</h4>
                                <?php endif ?>
                                <?php if ($p['sale']) : ?>
                                    <span class="old-price font-weight-light m-0"><?= $p['old_price'] ?> &#x20bd;</span>
                                <?php endif ?>
                                <span class="font-weight-bold m-0"><?= $p['price'] ?> &#x20bd;</span>
                            </span>
                        </div>
                        <a href="/product/<?= $p['id'] ?>" class="myB btn btn-warning btn-block rounded-0">Купить</a>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else : ?>
            <h3 class="text-center w-100">Товаров данной категории не существует</h3>
        <?php endif ?>
    </div>
</div>