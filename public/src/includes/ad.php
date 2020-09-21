<?php
    $hostName = 'localhost';
    $userName = 'root';
    $userPassword = '';
    $databaseName = 'ads';
    $mysqli = NEW MySQLi($hostName , $userName , $userPassword , $databaseName);
    $sql = 'SELECT * FROM ads_lists';
    $result = $mysqli->query($sql);
    if($result->num_rows == 0){
        echo "<a href='http://localhost/Simple-CMS/public/contact-us.php'><img class='m-auto' src='http://localhost/Simple-CMS/public/src/images/ad.jpg' alt='محل تبلیغ' style='width:500;height:75;'/></a>";
    }else{
        while($row = $result->fetch_assoc()){
            $ad_title = $row['ad_title'];
            $ad_href = $row['ad_href'];
            $ad_picture = $row['ad_picture'];
            echo "<a class='ad-image' href='$ad_href' title='$ad_title'><img src='$ad_picture' /></a>";
        }
    }
?>