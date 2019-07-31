<?php include ROOT . '/views/layouts/header.php' ?>

<main role="main" class="flex-shrink-0">

    <!-- Популярные игры -->
    <?php include ROOT . '/views/layouts/products.php' ?>
    
    <!-- Пегинация -->
    <?php $pagination->get() ?>

</main>

<?php include ROOT . '/views/layouts/footer.php' ?>