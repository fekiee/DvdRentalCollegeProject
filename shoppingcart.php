<?php
session_start();
var_dump($_SESSION['cart']);
inlcude ('connection.php');
$sql="
SELECT * FROM products WHERE id IN ($wherein)
";
echo $sql;
?>