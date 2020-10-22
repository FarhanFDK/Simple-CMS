<header class="header">
    <a href="" class="cursor">
    <p unselectable="on" class="float-right mr-4 mt-4 unselectable" style="position:relative;">
        <span class="dot-number" style="position:absolute;">
            <span unselectable="on" style="color:white;margin-right:1px;">
                <?php echo strlen(2); ?>
            </span>
        </span>
        <span class="dot">
            <i class='fas fa-shopping-basket mt-2 mr-2' style="font-size: 30px;color:white;"></i>
        </span>
    </p>
    </a>
    <div class="ad text-center">
        <?php
            # AD TOP OF THE HEADER
            $ad = NEW AD;
            $ad->host_name = 'localhost';
            $ad->user_name = 'root';
            $ad->user_pass = '';
            $ad->db_name = 'ads';
            $ad->table_name = 'ads_lists';
            $ad->column = 'ad_title';
            $ad->column2 = 'ad_href';
            $ad->column3 = 'ad_picture';
            $ad->connect();
        ?>
        
    </div>
    <div class="menu">
    <!-- 
        <a class='text-gray-600 my-12 mx-4 menu-button' href="">صفحه اصلی</a> 
        <a class='text-gray-600 my-12 mx-4 menu-button' href="">ورود</a>
        <a class='text-gray-600 my-12 mx-4 menu-button' href="">ثبت نام</a>
        <a class='text-gray-600 my-12 mx-4 menu-button' href="">ارتباط با ما</a>
        <a class='text-gray-600 my-12 mx-4 menu-button' href="">درباره ما</a>
        <a class='text-gray-600 my-12 mx-4 menu-button' href="">فروشگاه</a>
        <a class='text-gray-600 my-12 mx-4 menu-button' href=""></a>
    -->
        <?php
            $menu = NEW MENU();
            $menu->host_name = 'localhost';
            $menu->user_name = 'root';
            $menu->user_pass = '';
            $menu->db_name = 'MENU';
            $menu->table_name = 'list';
            $menu->column_title = 'title';
            $menu->column_href = 'href';
            $menu->connect();
        ?>
    </div>
</header>