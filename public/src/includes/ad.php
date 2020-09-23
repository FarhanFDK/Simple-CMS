<?php
    $hostName = 'localhost';
    $userName = 'root';
    $userPassword = '';
    $databaseName = 'ads';
    $mysqli = NEW MySQLi($hostName , $userName , $userPassword , $databaseName);
    $sql = 'SELECT * FROM ads_lists';
    $result = $mysqli->query($sql);
    if($result->num_rows == 0){
        echo "<div class='m-auto' style='width:500px;height:75px;'>";
        echo "  <a href='http://localhost/Simple-CMS/public/contact-us.php' title=''>
                    <img src='src/images/ad.jpg' />
                </a>";
        echo "</div>";
    }else{
        while($row = $result->fetch_assoc()){
            $ad_title = $row['ad_title'];
            $ad_href = $row['ad_href'];
            $ad_picture = $row['ad_picture'];
            echo "<a class='ad-image' href='$ad_href' title='$ad_title'><img src='$ad_picture' /></a>";
        }
    }
?>