<?php include ROOT . '/views/layouts/header.php' ?>

<div class="container p-0 p-md-3">
    <div class="my-0 my-sm-3 bg-white shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-12">                    
                    <h3>Email: <?= $user->email ?></h2>
                    <h3>Имя: <?= $user->name ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>