<?php include $_SERVER['DOCUMENT_ROOT'].'/components/header.php';?>

<h1>Login Form</h1>
<?php 
if($_SESSION["authenticated"] = true) {
    echo "AUTHENTICATED";
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
* E-mail: 
<br>
<input type="email" name="email" pattern="/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/" title="Please provide right email address" required>
<br>
* Password: 
<br>
<input type="password" name="password" pattern=".{8,15}" title="Minimum 8 characters maximum 15" required >
<input type="submit" value="OK">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = test_input($_POST["password"]);
    $email = test_input($_POST["email"]);
    $err = "";
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err = "Email not formatted correctly.";
    } else if (strlen($password)<8 || strlen($password) > 15) {
        $err = "Password must be between 8 and 15 characters long.";
    }
  }

  if($err) {
    if($err) { 
        echo  "<p class='red'>$err</p>";
     }
  } else {
    include $_SERVER['DOCUMENT_ROOT'].'/db/queries.php';
    login($email,$password);
  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/components/footer.php';?>

<style>
.red {
    color:red;
}
</style>
