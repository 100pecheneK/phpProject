<div class="container">
    <div class="row">
        <?php foreach ($latestProducts as $lP) : ?>
            <div class="col-6 col-lg-4 col-xl-3 mt-4 mb-4">
                <div class="card">
                    <div class="img-wrap">
                        <img src="/template/images/small/<?= $lP['image'] ?>" class="card-img-top" alt="...">
                        <span class="img-wrap-span border border-warning text-warning p-1 text-center bg-dark-trans">
                            <?php if ($lP['sale'] == 1): ?>
                            <span class="old-price font-weight-light m-0"><?= $lP['old_price'] ?> &#x20bd;</span>
                            <?php endif ?>
                            <span class="font-weight-bold m-0"><?= $lP['price'] ?> &#x20bd;</span>
                        </span>
                    </div>
                    <a href="/product/<?= $lP['id'] ?>" class="myB btn btn-warning btn-block rounded-0">Купить</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>