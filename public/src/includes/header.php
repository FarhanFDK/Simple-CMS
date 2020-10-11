<header class="header">
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