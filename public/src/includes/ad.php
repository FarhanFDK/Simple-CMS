<?php
    $hostName = 'localhost';
    $userName = 'root';
    $userPassword = '';
    $databaseName = 'ads';
    $mysqli = NEW MySQLi($hostName , $userName , $userPassword , $databaseName);
    $sql = 'SELECT * FROM ads_lists';
    $result = $mysqli->query($sql);
    if($result->num_rows == 0){
        echo "<a href='http://localhost/Simple-CMS/public/contact-us.php'><img src='http://localhost/Simple-CMS/public/src/images/ad.php' alt='محل تبلیغ'/>$contact_us</a>";
    }else{
        while($row = $result->fetch_assoc()){
            $ad_picture = $row['ad_picture'];
            $ad_href = $row['ad_href'];
            $ad_title = $row['ad_title'];
            echo "<a class='ad-image' href='$ad_href' title='$ad_title'><img src='$ad_picture' /></a>";
        }
    }
?>