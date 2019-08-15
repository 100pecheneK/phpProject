<?php

/**
 * Создаёт блок с элементами постраничной навигации.
 */
class Pagination
{
    /**
     * Количество элементов.
     * @var int $total_count Хранит в себе количество элементов
     * на всех страницах.
     */
    private $total_count;
    /**
     * Количество элементов на странице.
     * @var int $per_page Хранит в себе количество элементов на одной странице.
     */
    private $per_page;
    /**
     * Текущая страница.
     * @var int $page Хранит в себе номер текущей страницы.
     */
    private $page;
    /**
     * Ключ.
     * @var string $index Хранит в себе строку,
     * идущую перед номером страницы в URL.
     */
    private $index;
    /**
     * Объявление переменных.
     */
    public function __construct($total_count, $per_page, $page, $index  = 'page-')
    {
        $this->total_count = $total_count;
        $this->per_page = $per_page;
        $this->page = $page;
        $this->index = $index;
    }
    /**
     * Вычисляет сколько страниц должно быть слева и справа от центра.
     * @param int $total_pages Принимает количество элементов 
     * на всех страницах.
     * @return array Вернёт массив со страницами слева (left) и справа (right).
     */
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
    /**
     * Выводит <li> с <a> на страницы.
     * @param array $pages Массив со страницами слева и справа.
     * @param array $segments Массив с сегментами REQUEST_URI.
     */
    private function getLi($pages, $segments)
    {
        for ($i = $pages['left']; $i <= $pages['right']; $i++) {
            if ($this->page == $i) {
                $bg = ' bg-warning';
                $disabled = ' disabled';
            } else {
                $bg = '';
                $disabled = '';
            }
            echo '<li class="page-item' . $disabled . '"><a class="page-link' .
                $bg . ' text-dark" href="' . $segments[0] . '/' . $this->index .
                $i . '">' . $i . '</a></li>';
        }
    }
    /**
     * Выводит HTML код постраничной навигации.
     */
    public function get()
    {
        $total_pages = ceil($this->total_count / $this->per_page);
        $segments = explode("/$this->index", $_SERVER['REQUEST_URI']);
        $pages = $this->getLeftRightPages($total_pages);

        echo '<nav aria-label="Page navigation" class="my-2">';
        echo '<ul class="pagination justify-content-center ">';

        $this->getLi($pages, $segments);

        echo '</ul>';
        echo '</nav>';
    }
}
