<?php require "src/includes/classes.php" ?>

<?php require "src/includes/head.php" ?>
<?php require "src/includes/header.php" ?>
<div class="middle mtop">
    <div>
    </div>
</div>

<?php require "src/includes/footer.php" ?>
<?php 
    $visit = NEW VISITS;
    $visit->host_name = 'localhost';
    $visit->user_name = 'root';
    $visit->user_pass = '';
    $visit->db_name = 'another_page_visits';
    $visit->column_name = 'visit_number';
    $visit->table_name = 'index';
    $visit->selection = "SELECT * FROM $visit->table_name";
    $visit->connect();
?>
