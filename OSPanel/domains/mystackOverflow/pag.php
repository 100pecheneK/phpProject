<?php
// запросы пегинации
$per_page = 20;
$page = 1;

if (isset($_GET['page'])) {
    $page = (int) $_GET['page'];
}

$total_count = R::count('questions');

$total_pages = ceil($total_count / $per_page);

if ($page < 1 || $page > $total_pages) {
    $page = 1;
}

$offset = ($per_page * $page) - $per_page;

$articles = $questions = R::findAll('questions', "ORDER BY `id` DESC LIMIT $offset, $per_page");
$articles_exist = true;
// /запросы пегинации
?>


<!-- Пегинация -->
<div class="col-12">
    <?php
    if ($total_pages <= 4) {
        $page_left = 1;
        $page_right = $total_pages;
    } else {
        $page_show = 2;
        $page_left = $page - $page_show;
        $page_right = $page + $page_show;
        if ($page_left < 1) {
            $page_left = 1;
        }
        if ($page_right > $total_pages) {
            $page_right = $total_pages;
        };
        if ($page == 2) {
            $page_right = 5;
        }
        if ($page == 1) {
            $page_right = 5;
        }
        if ($page == $total_pages - 1) {
            $page_left = $total_pages - 4;
        }
        if ($page == $total_pages) {
            $page_left = $total_pages - 4;
        }
    }
    if ($articles_exist) {
        ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center ">
                <li class="page-item shadow <?php if ($page <= 1) echo 'disabled'; ?> "><a class="page-link" href="/pages/questions.php?page=<?php echo 1; ?>">Первая</a></li>
                <li class="page-item shadow <?php if ($page <= 1) echo 'disabled'; ?> "><a class="page-link" href="/pages/questions.php?page=<?php echo ($page - 1); ?>">Назад</a></li>
                <li class="page-item shadow <?php if ($page >= $total_pages) echo 'disabled'; ?> "><a class="page-link" href="/pages/questions.php?page=<?php echo ($page + 1); ?>">Вперёд</a></li>
                <li class="page-item shadow <?php if ($page >= $total_pages) echo 'disabled'; ?> "><a class="page-link" href="/pages/questions.php?page=<?php echo $total_pages; ?>">Последняя</a></li>
            </ul>
            <ul class="pagination justify-content-center ">
                <li class="page-item shadow <?php if ($page - 3 < 1) echo 'disabled'; ?>"><a class="page-link" href="/pages/questions.php?page=<?php echo ($page - 3); ?>">...</a></li>
                <?php
                for ($i = $page_left; $i <= $page_right; $i++) {
                    ?>
                    <li class="page-item shadow <?php if ($i == $page) echo 'disabled'; ?>"><a class="page-link" href="/pages/questions.php?page=<?php echo $i; ?>"><?php echo $i ?></a></li>
                <?php
                }
                ?>
                <li class="page-item shadow <?php if ($page + 3 > $total_pages) echo 'disabled'; ?>"><a class="page-link" href="/pages/questions.php?page=<?php echo ($page + 3); ?>">...</a></li>
            </ul>

        </nav>
    <?php
    }
    ?>
</div>
<!-- Конец пегинации -->