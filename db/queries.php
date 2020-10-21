<?php

function register($email,$pass) {
    include $_SERVER['DOCUMENT_ROOT'].'/db/db_connection.php';
    $sql = "INSERT INTO php.users (email, password)
    VALUES ('$email', '$pass')";
    if ($conn->query($sql) === TRUE) {
        echo "<h2>Successfully registered</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function login($email,$pass) {
    include $_SERVER['DOCUMENT_ROOT'].'/db/db_connection.php';
    $sql = "SELECT email FROM php.users WHERE password='$pass' AND email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION["authenticated"] = true;
        echo "<h2>Successfully logged in</h2>";
        while($row = $result->fetch_assoc()) {
          echo "id: " . $row["id"]. " - Email: " . $row["email"]."<br>";
        }
      } else {
        echo "<h2>User not found</h2>";
      }
}

function getCategories() {
    include $_SERVER['DOCUMENT_ROOT'].'/db/db_connection.php';
    $sql = "SELECT name,id FROM php.categories";
    $result = $conn->query($sql);
    if ($result && $result->num_rows && $result->num_rows > 0) {
        $categories = [];
        $fieldinfo = $result -> fetch_fields();
        while($row = $result->fetch_assoc()) {
            array_push($categories, [
                $row["id"],$row["name"]
            ]);
        }
        return $categories;
    } else {
        echo "<h2>No categories found</h2>";
    }
}

function getSubcategories($categoryId) {
    include $_SERVER['DOCUMENT_ROOT'].'/db/db_connection.php';
    $sql = "SELECT name,description,id FROM php.subcategories WHERE category_id=$categoryId";
    $result = $conn->query($sql);
    if ($result && $result->num_rows && $result->num_rows > 0) {
        $subcategories = [];
        $fieldinfo = $result -> fetch_fields();
        while($row = $result->fetch_assoc()) {
            array_push($subcategories, [
                $row["id"],$row["name"],$row["description"],$categoryId
            ]);
        }
        return $subcategories;
    } else {
        echo "<h2>No subcategories found</h2>";
    }
}

function getItem($id) {
    include $_SERVER['DOCUMENT_ROOT'].'/db/db_connection.php';
    $sql = "SELECT name,description,id FROM php.subcategories WHERE id=$id";
    $result = $conn->query($sql);
    if ($result && $result->num_rows && $result->num_rows > 0) {
        $fieldinfo = $result -> fetch_fields();
        while($row = $result->fetch_assoc()) {
            return $row;
        }
    } else {
        echo "<h2>No item found</h2>";
    }
}

function addCategory($name) {
    include $_SERVER['DOCUMENT_ROOT'].'/db/db_connection.php';
    $sql = "INSERT INTO php.categories (name)
    VALUES ('$name')";
    if ($conn->query($sql) === TRUE) {
        echo "<h2>Successfully added category</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
function addSubcategory($name, $description, $categoryId) {
    include $_SERVER['DOCUMENT_ROOT'].'/db/db_connection.php';
    $sql = "INSERT INTO php.subcategories (name, description, category_id)
    VALUES ('$name', '$description', '$categoryId')";
    if ($conn->query($sql) === TRUE) {
        echo "<h2>Successfully added subcategory</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function editCategory($name, $id) {
    include $_SERVER['DOCUMENT_ROOT'].'/db/db_connection.php';
    $sql = "UPDATE  php.categories SET 
    name='$name' where id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<h2>Successfully edited category</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function editSubcategory($name, $description, $id) {
    include $_SERVER['DOCUMENT_ROOT'].'/db/db_connection.php';
    $sql = "UPDATE  php.subcategories SET 
    name='$name', description='$description' where id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<h2>Successfully edited subcategory</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function deleteItem($id, $table) {
    include $_SERVER['DOCUMENT_ROOT'].'/db/db_connection.php';
    $sql = "DELETE FROM php.$table WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<h2>Successfully deleted item</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>