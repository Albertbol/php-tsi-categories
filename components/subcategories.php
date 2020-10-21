<?php
include $_SERVER['DOCUMENT_ROOT'].'/db/queries.php';
if(!$_GET['categoryId']) {
echo "Category ID not provided";
} else {
    $categoryId = htmlspecialchars($_GET['categoryId']);
    $subcategories = getSubcategories($categoryId);
    if($subcategories) {
           foreach ($subcategories as $value) {
        echo "<p>".
            "<a href='//$_SERVER[HTTP_HOST]/items.php?id=$value[0]&subcategoryId=$value[3]'>$value[1]</a>";
        if ($_SESSION["authenticated"] == true){
            echo "<a href='//$_SERVER[HTTP_HOST]/actions/index.php?item=subcategory&action=edit&id=$value[0]'>EDIT</a>".
            "<a href='//$_SERVER[HTTP_HOST]/actions/index.php?item=subcategory&action=delete&id=$value[0]'>DELETE</a>";
        }
    echo "</p>"; 
    }
    if ($_SESSION["authenticated"] == true){
    echo "<a class='padding-bottom' href='//$_SERVER[HTTP_HOST]/actions/index.php?item=subcategory&action=add&id=$categoryId'>Add Subcategory</a>";
    }
}

}
      
?>

<style>
.padding-bottom {
    padding-bottom:60px;
}
</style>