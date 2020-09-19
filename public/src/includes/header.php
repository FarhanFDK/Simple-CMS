<header class="header">
    <div class="menu">
        <?php
            $hostName = 'localhost';
            $userName = 'root';
            $userPassword = '';
            $databaseName = 'menu';
            $mysqli = new MySQLi($hostName , $userName , $userPassword , $databaseName);
            $sql = "SELECT * FROM lists";
            $result = $mysqli->query($sql); 
            while($row = $result->fetch_assoc()){
                $list_title = $row['list_title'];
                echo $list_title;
            }
        ?>
    </div>
</header>