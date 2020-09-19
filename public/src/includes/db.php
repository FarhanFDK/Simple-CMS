<?php
    $hostName = "";
    $userName = "";
    $userPassword = "";
    $databaseName = "";
    $connection = mysqli_connect($hostName , $userName , $userPassword , $databaseName);
    if(!$connection){
        die("connection to server has failed!");
    }
?>