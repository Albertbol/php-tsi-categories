<?php
include $_SERVER['DOCUMENT_ROOT'].'/db/queries.php';
if(!$_GET['id'] || !$_GET['subcategoryId']) {
echo "Item ID not provided";
} else {
    $id = htmlspecialchars($_GET['id']);
    $subcategoryId = htmlspecialchars($_GET['subcategoryId']);
    $item = getItem($id);
    if($item) {
        echo "<p>Item id: ".$item['id']."</p>";
        echo "<p>Name: ".$item['name']."</p>";
        echo "<p>Description id: ".$item['description']."</p>";
        echo "<a href='//$_SERVER[HTTP_HOST]/subcategories.php?categoryId=$subcategoryId'>Back to subcategory</a>";
    }
}
      
?>

<style>
.padding-bottom {
    padding-bottom:60px;
}
</style>