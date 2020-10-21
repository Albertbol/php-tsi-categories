<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/components/header.php';
    echo "<h1>Categories</h1>";
    $my_images = array();
    for ($i =1; $i<=10; $i++) {
        array_push($my_images, "$i.jpg");
    }
    shuffle($my_images);

    for ($i =0; $i<5; $i++) {
        echo "<img src='./static/images/$my_images[$i]' />";
    }
    include $_SERVER['DOCUMENT_ROOT'].'/components/categories.php';
    include $_SERVER['DOCUMENT_ROOT'].'/components/footer.php';
?>