<?php require "src/includes/classes.php" ?>
<?php require "src/includes/functions.php" ?>
<?php require "src/includes/head.php" ?>
<?php require "src/includes/header.php" ?>
<div class="middle mtop">
    <div>
    </div>
</div>

<?php require "src/includes/footer.php" ?>
<?php

    $visit = NEW VISITS();
    $visit->host_name = 'localhost';
    $visit->user_name = 'root';
    $visit->user_pass = '';
    $visit->db_name = 'visits';
    $visit->column = 'visit_number';
    $visit->table_name = 'visits';
    $visit->connect();


    /*$visits = NEW VISITS;
    $visits->host_name = 'localhost';
    $visits->user_name = 'root';
    $visits->user_pass = '';
    $visits->db_name = 'another_page_visits';
    $visits->column = 'visit_number';
    $visits->table_name = 'home/page';
    $visits->VISITS_INCREASE();*/

?>
