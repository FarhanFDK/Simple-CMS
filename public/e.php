<?php
$m = "farhanabdollahisdgmail.c";
$d = "@";
$index = strpos($m , $d);
echo $index . "<br>";
$d = ".";
$index2 = strpos($m , $d);
$length = strlen(substr($m , $index + 1 , 2)) . "<br>";
echo $length;
$length2 = strlen(substr($m , $index2 + 1 , 2));
echo "<br>" . $length2;
?>
