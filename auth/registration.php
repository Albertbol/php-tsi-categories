<?php include $_SERVER['DOCUMENT_ROOT'].'/components/header.php';?>

<h1>File output:</h1>
<?php 
$fileName="../static/data_form.txt";
$myfile = fopen($fileName, "w");
foreach (array_keys($_POST) as  $key) {
    $txt = "$key:$_POST[$key]|";
    fwrite($myfile, $txt);
}
fclose($myfile);

$myfile = fopen($fileName, "r");
$read = fread($myfile, filesize($fileName));
echo preg_replace("/\|/", " ", $read);
?>

<?php
include $_SERVER['DOCUMENT_ROOT']."/db/queries.php";
register($_POST['email'],$_POST['password']);
include $_SERVER['DOCUMENT_ROOT'].'/components/footer.php';
?>
