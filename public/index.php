<?php $title = "شرکت افراگسترنوین-صفحه اصلی" ?>
<?php
    class Content{
        public $h;
    }
?>

<?php require "src/includes/classes.php"; ?>
<?php require "src/includes/head.php"; ?>
<?php require "src/includes/header.php"; ?>
<div class="middle mtop">
    <div>
        
    </div>
</div>
<?php require "src/includes/footer.php"; ?>

<?php
    $visit = NEW VISITS();
    $visit->connect();
/*
    $visits = NEW VISITS();
    $visits->db_name = 'another_page_visits';
    $visits->column = 'visit_number';
    $visits->table_name = 'home/page';
    $visits->connect();
*/
?>
