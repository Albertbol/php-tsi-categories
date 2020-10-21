<?php
include $_SERVER['DOCUMENT_ROOT'].'/db/queries.php';
$categories = getCategories();
if($categories) {
    foreach ($categories as $value) {
        echo "<p>".
            "<a href='//$_SERVER[HTTP_HOST]/subcategories.php?categoryId=$value[0]'>$value[1]</a>";
        if ($_SESSION["authenticated"] == true){
            echo "<a href='//$_SERVER[HTTP_HOST]/actions/index.php?item=category&action=edit&id=$value[0]'>EDIT</a>".
            "<a href='//$_SERVER[HTTP_HOST]/actions/index.php?item=category&action=delete&id=$value[0]'>DELETE</a>";
        }
    echo "</p>";
    }
}

if ($_SESSION["authenticated"] == true){
echo "<a class='padding-bottom' href='//$_SERVER[HTTP_HOST]/actions/index.php?item=category&action=add'>Add Category</a>";
}
      
?>

<style>
.padding-bottom {
    padding-bottom:60px;
}
</style>