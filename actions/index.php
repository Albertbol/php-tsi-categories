<?php 
  $err = "";
  include $_SERVER['DOCUMENT_ROOT']."/components/header.php";
  $title = '';
  if ($_SESSION["authenticated"] == true){
  $item = htmlspecialchars($_GET['item']);
  $action = htmlspecialchars($_GET['action']);
  $id = htmlspecialchars($_GET['id']);

  $allowedItems = ["category","subcategory"];
  $allowedActions = ["add", "edit", "delete"];
  $Action = ucfirst($action);
  $Item = ucfirst($item);
  $table = $item === 'category' ? 'categories' : 'subcategories';

  if(in_array($item, $allowedItems) && in_array($action, $allowedActions)) {
    if($action==='delete') {
      include $_SERVER['DOCUMENT_ROOT']."/db/queries.php";
        deleteItem($id,$table);
    } else {
      echo "<h1>$Action $Item</h1>";
      if($err) { echo "<p>$err>/p>";}
      echo "<form method='post' action='".htmlspecialchars($_SERVER['PHP_SELF'])."?action=$action&item=$item&id=$id'>";
      echo "<span>$Item name: </span>";
      echo "<input type='text' placeholder='$item name' name='name' minlength='1' maxlength='40' required>";
      if($item==='subcategory') {
        echo "<br/><span>$Item description: </span>";
        echo "<input type='text' placeholder='$item description' name='description' minlength='1' maxlength='40' required>";
      }
      if($item==='subcategory' || $action==='edit' || $action==='delete') {
        echo "<input class='hidden' type='hidden' name='id' value='$id' required>";
      }
      echo "<br/><input type='submit' value='$Action $Item'></form>"; 
    }
  } else {
    echo "<h1>Invalid action</h1>";
  }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $description = htmlspecialchars($_POST["description"]);
    $id = htmlspecialchars($_POST["id"]);
    if (strlen($name)<1 || strlen($name) > 40) {
        $err = "$Item name should be between 1 - 40.";
    } else if ($item === 'subcategory' && strlen($description)<1 || strlen($description) > 40) {
        $err = "$Item description should be between 1 - 40.";
    } else if($action==='edit' && !$id) {
      $err = "Id required";
    } else {
        $err = "";
        include $_SERVER['DOCUMENT_ROOT']."/db/queries.php";
        if($item ==='category') {
          if($action==='add') {
            addCategory($name);
          } else if ($action ==='edit') {
            editCategory($name, $id);
          }
        } else if($item==='subcategory') {
          if($action==='add') {
            addSubcategory($name,$description, $id);
          } else if ($action ==='edit') {
            editSubcategory($name,$description, $id);
          }
        }
    }
  }
  include $_SERVER['DOCUMENT_ROOT'].'/components/footer.php';
} else {
  include $_SERVER['DOCUMENT_ROOT'].'/auth/login_required.php';
}
?>


<style>
    .hidden {
      visibility: hidden;
    }
</style>