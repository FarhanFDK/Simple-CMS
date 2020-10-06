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
        <?php
            /*$hostName = 'localhost';
            $userName = 'root';
            $userPassword = '';
            $databaseName = 'menu';
            $mysqli = NEW MySQLi($hostName , $userName , $userPassword , $databaseName);
            $sql = "SELECT * FROM lists";
            $result = $mysqli->query($sql); 
            while($row = $result->fetch_assoc()){
                $list_title = $row['list_title'];
                echo "<a class='text-gray-600 m-6' href='http://localhost/Simple-CMS/public/$list_title' title='$list_title'>$list_title</a>";
            }*/
        ?>
    </div>
</header>