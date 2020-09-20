<header class="header">
    <div class="menu">
        <?php
            $hostName = 'localhost';
            $userName = 'root';
            $userPassword = '';
            $databaseName = 'menu';
            $mysqli = NEW MySQLi($hostName , $userName , $userPassword , $databaseName);
            $sql = "SELECT * FROM lists";
            $result = $mysqli->query($sql); 
            while($row = $result->fetch_assoc()){
                $list_title = $row['list_title'];
                echo "<a class='text-gray-600' href='http://localhost/Simple-CMS/public/lists/$list_title' title='$list_title'>$list_title</a>";
            }
        ?>
    </div>
</header>