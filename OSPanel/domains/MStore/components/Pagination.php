<?php

class Pagination
{
    // Количество элементов
    private $total_count;
    // Количество элементов на оной странице
    private $per_page;
    // Текущая странциа
    private $page;
    // Ключ, в который пишется номер страницы
    private $index;

    public function __construct($total_count, $per_page, $page, $index = 'page-')
    {
        $this->total_count = $total_count;
        $this->per_page = $per_page;
        $this->page = $page;
        $this->index = $index;
    }
    // Вернёт массив с количеством страниц слева и справа
    private function getLeftRightPages($total_pages)
    {
        if ($total_pages <= 4) {
            $page_left = 1;
            $page_right = $total_pages;
        } else {
            $page_show = 2;
            $page_left = $this->page - $page_show;
            $page_right = $this->page + $page_show;
            if ($page_left < 1) {
                $page_left = 1;
            }
            if ($page_right > $total_pages) {
                $page_right = $total_pages;
            };
            if ($this->page == 2) {
                $page_right = 5;
            }
            if ($this->page == 1) {
                $page_right = 5;
            }
            if ($this->page == $total_pages - 1) {
                $page_left = $total_pages - 4;
            }
            if ($this->page == $total_pages) {
                $page_left = $total_pages - 4;
            }
        }
        $pages = array(
            'left' => $page_left,
            'right' => $page_right
        );
        return $pages;
    }
    // Распечатает <li></li>
    private function getLi($left, $right, $segments)
    {
        for ($i = $left; $i <= $right; $i++) {
            if ($this->page == $i) {
                $bg = 'bg-warning';
                $disabled = 'disabled';
            } else {
                $bg = '';
                $disabled = '';
            }
            echo '<li class="page-item ' . $disabled . '"><a class="page-link ' . 
            $bg . ' text-dark" href="' . $segments[0] . '/' . $this->index . 
            $i . '">' . $i . '</a></li>';
        }
    }
    // Создаёт HTML код
    public function get()
    {
        $total_pages = ceil($this->total_count / $this->per_page);
        $segments = explode("/$this->index", $_SERVER['REQUEST_URI']);
        $pages = $this->getLeftRightPages($total_pages);

        echo '<nav aria-label="Page navigation example">';
        echo '<ul class="pagination justify-content-center ">';

        $this->getLi($pages['left'], $pages['right'], $segments);
        
        echo '</ul>';
        echo '</nav>';
    }
}
