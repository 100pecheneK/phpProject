<div class="row">
    <div class="col-12">
        <a href="/admin" class="btn btn-block btn-warning rounded-0 text-left pl-4"><i class="fas fa-home"></i> На главную</a>
    </div>
    <div class="col-12">
        <nav class="navbar navbar-dark bg-dark p-0">
            <button class=" btn btn-block btn-warning rounded-0 text-left pl-4 settings_icon" type="button" data-toggle="collapse" data-target="#navbarToggle1" aria-controls="navbarToggle1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="text-dark"><i class="fas fa-cog settings_icon"></i> Управление товарами</span>
            </button>
        </nav>
        <div class="collapse <?php if(isset($nav_product)) echo $nav_product ?>" id="navbarToggle1">
            <div class="bg-dark">
                <ul class="my-ul m-0 pl-4">
                    <li>
                        <a href="/admin/product" class="nav-link  btn btn-block btn-warning rounded-0 text-left">Все товары</a>
                    </li>
                    <li>
                        <a href="/admin/product/create" class="nav-link  btn btn-block btn-warning rounded-0 text-left"><i class="fas fa-plus"></i> Добавить товар</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12">
        <nav class="navbar navbar-dark bg-dark p-0">
            <button class=" btn btn-block btn-warning rounded-0 text-left pl-4 settings_icon" type="button" data-toggle="collapse" data-target="#navbarToggle2" aria-controls="navbarToggle2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="text-dark"><i class="fas fa-cog settings_icon text-dark"></i> Управление категориями</span>
            </button>
        </nav>
        <div class="collapse" id="navbarToggle2">
            <div class="bg-dark">
                <ul class="my-ul m-0 pl-4">
                    <li>
                        <a href="/admin/category" class="nav-link btn btn-block btn-warning rounded-0 text-left">Все категориии</a>
                    </li>
                    <li>
                        <a href="/admin/category/create" class="nav-link btn btn-block btn-warning rounded-0 text-left"><i class="fas fa-plus"></i> Добавить категорию</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12">
        <nav class="navbar navbar-dark bg-dark p-0">
            <button class=" btn btn-block btn-warning rounded-0 text-left pl-4 settings_icon" type="button" data-toggle="collapse" data-target="#navbarToggle3" aria-controls="navbarToggle3" aria-expanded="false" aria-label="Toggle navigation">
                <span class="text-dark"><i class="fas fa-cog settings_icon text-dark"></i> Управление пользователями</span>
            </button>
        </nav>
        <div class="collapse" id="navbarToggle3">
            <div class="bg-dark">
                <ul class="my-ul m-0 pl-4">
                    <li>
                        <a href="/admin/user" class="nav-link btn btn-block btn-warning rounded-0 text-left">Все пользователи</a>
                    </li>
                    <li>
                        <a href="/admin/user/create" class="nav-link btn btn-block btn-warning rounded-0 text-left"><i class="fas fa-plus"></i> Добавить пользователя</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>