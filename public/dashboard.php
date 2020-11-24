<?php $title = ""; ?>
<?php
    class Content{
        public $h;
    }
?>
<?php
    if(isset($_COOKIE['email'])){

    }
?>
<?php require "src/includes/classes.php"; ?>
<?php require "src/includes/head.php"; ?>
<?php require "src/includes/header.php"; ?>
<div class="middle mtop">
  <div><?php echo "hello" . $_SESSION['firstname']; ?></div>
  <?php

  /*if(isset($_COOKIE)){
    foreach ($_COOKIE as $key => $value) {
      $connect_with_cookie = new LOGIN();
      $connect_with_cookie->cookie_login = $key;
      $connect_with_cookie->cookie_login2 = $value;
      $reflector = new ReflectionObject($connect_with_cookie);
      $method = $reflector->getMethod('connect_with_cookie');
      $method->setAccessible(true);
      if($method->invoke($connect_with_cookie) == true){
          echo "ha";
      }
    }
  }else{

  }*/
  ?>
</div>
<?php require "src/includes/footer.php"; ?>
