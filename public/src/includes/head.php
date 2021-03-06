<?php
    session_start();
    session_regenerate_id(false);
?>
<?php
    if(property_exists("Content" , "h")){
        $head_content = "";
    }else{
        $head_content = '<meta http-equiv="refresh" content="0; url=http://localhost/Simple-CMS/public/index.php" />';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title><?php echo $title ?></title>
        <meta name="robots" content="" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <?php echo $head_content; ?>
        <?php if(isset($head_content_2)){echo $head_content_2;} ?>
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <link rel="stylesheet" href="src/css/index.css" />
        <link rel="stylesheet" href="src/css/media.css" />
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" />
        <link rel="shortcut icon" href="src/images/icons/.." />
        <link rel="icon" href="src/images/icons/.." />
        <script src="https://kit.fontawesome.com/b39b75221a.js" crossorigin="anonymous"></script>
        <script src="src/js/classes.js"></script>
        <script src="src/js/functions.js"></script>
        <script src="src/jquery/jquery-3.5.1.min.js"></script>
        <style>
        </style>
    </head>
    <body>
