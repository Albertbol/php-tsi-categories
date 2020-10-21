<?php
// fix init buggs and we can push to github :D
// maybe readme would be good

function init() {
    createCategoriesTable();
    createSubcategoriesTable();
    createUsersTable();
    include $_SERVER['DOCUMENT_ROOT'].'/db/queries.php';
    mockcategoriesTableData();
    mockSubcategoriesTableData();
}
function createCategoriesTable() {
    include $_SERVER['DOCUMENT_ROOT'].'/db/db_connection.php';
    $sql = "CREATE TABLE php.categories (
        id int(11) NOT NULL AUTO_INCREMENT,
        name text NOT NULL,
        PRIMARY KEY (id),
        UNIQUE KEY id (id)
      );";
    if ($conn->query($sql) === TRUE) {
        echo "<h2>Successfully created categories table</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function createSubcategoriesTable() {
    include $_SERVER['DOCUMENT_ROOT'].'/db/db_connection.php';
    $sql = "CREATE TABLE php.subcategories (
        id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
        name text,
        category_id int(11) DEFAULT NULL,
        description text,
        PRIMARY KEY (id),
        UNIQUE KEY id (id),
        KEY category_id (category_id),
        CONSTRAINT subcategories_ibfk_1 FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE ON UPDATE CASCADE
      );";
    if ($conn->query($sql) === TRUE) {
        echo "<h2>Successfully created subcategories table</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function createUsersTable() {
    include $_SERVER['DOCUMENT_ROOT'].'/db/db_connection.php';
    $sql = "CREATE TABLE php.users (
        id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
        email text,
        password text,
        PRIMARY KEY (id),
        UNIQUE KEY id (id)
      );";
    if ($conn->query($sql) === TRUE) {
        echo "<h2>Successfully created users table</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function mockcategoriesTableData() {
    $categories=['sport','photo','cars'];
    foreach ($categories as $name) {
        addCategory($name);
    }
}

function mockSubcategoriesTableData() {
    $subcategories=[
        ['hockey','hockey description'],
        ['nature','nature description'],
        ['electrical','electrical description'],
    ];
    $categories = getCategories();
    foreach ($categories as $key=>$value) {
        addSubcategory($subcategories[$key][0],$subcategories[$key][1], $key+1);
    }
}

?>