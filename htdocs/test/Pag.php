<?php

class Pagination{

    private $total_count;
    private $total_pages;
    private $page;
    private $per_page = 10;
    private $articles_exist = true;

    public function __construct($total_count, $total_pages, $page, $per_page)
    {
        $this->total_count = $total_count;
        $this->total_pages = $total_pages;
        $this->page = $page;
        $this->per_page = $per_page;
    }

    private function get()
    {
        if ($this->total_pages <= 4) {
            $page_left = 1;
            $page_right = $this->total_pages;
        } else {
            $page_show = 2;
            $page_left = $this->page - $page_show;
            $page_right = $this->page + $page_show;
            if ($page_left < 1) {
                $page_left = 1;
            }
            if ($page_right > $this->total_pages) {
                $page_right = $this->total_pages;
            };
            if ($this->page == 2) {
                $page_right = 5;
            }
            if ($this->page == 1) {
                $page_right = 5;
            }
            if ($this->page == $this->total_pages - 1) {
                $page_left = $this->total_pages - 4;
            }
            if ($this->page == $this->total_pages) {
                $page_left = $this->total_pages - 4;
            }
        }
        ?>
        <div class="col-12">   
            <?php
            if ($this->articles_exist) {
                $url = $_SERVER['REQUEST_URI'];
                ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item shadow <?php if ($this->page <= 1) echo 'disabled'; ?> "><a class="page-link" href="/<?php echo 1; ?>">Первая</a></li>
                        <li class="page-item shadow <?php if ($this->page <= 1) echo 'disabled'; ?> "><a class="page-link" href="/<?php echo ($this->page - 1); ?>">Назад</a></li>
                        <li class="page-item shadow <?php if ($this->page >= $this->total_pages) echo 'disabled'; ?> "><a class="page-link" href="/<?php echo ($this->page + 1); ?>">Вперёд</a></li>
                        <li class="page-item shadow <?php if ($this->page >= $this->total_pages) echo 'disabled'; ?> "><a class="page-link" href="/<?php echo $this->total_pages; ?>">Последняя</a></li>
                    </ul>
                    <ul class="pagination justify-content-center">
                        <li class="page-item shadow <?php if ($this->page - 3 < 1) echo 'disabled'; ?>"><a class="page-link" href="/<?php echo ($this->page - 3); ?>">...</a></li>
                        <?php
                        for ($i = $page_left; $i <= $page_right; $i++) {
                            ?>
                            <li class="page-item shadow <?php if ($i == $this->page) echo 'disabled'; ?>"><a class="page-link" href="/<?php echo $i; ?>"><?php echo $i ?></a></li>
                        <?php
                        }
                        ?>
                        <li class="page-item shadow <?php if ($this->page + 3 > $this->total_pages) echo 'disabled'; ?>"><a class="page-link" href="/<?php echo ($this->page + 3); ?>">...</a></li>
                    </ul>
        
                </nav>
            <?php
            }
            ?>
        </div>
        
    }


}
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
?>
<div class="col-12">   
    <?php
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
