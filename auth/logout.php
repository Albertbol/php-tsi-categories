<?php 
include $_SERVER['DOCUMENT_ROOT'].'/components/header.php';

$_SESSION["authenticated"] = false;
echo "<h1>You are logged out</h1>";

include $_SERVER['DOCUMENT_ROOT'].'/components/footer.php';
?>
