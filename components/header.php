<?php
include $_SERVER['DOCUMENT_ROOT']."/session/index.php";
$websiteName = "Random website name";
$name = "Albert";
$lastName = "Bolush";
?>

<h1><?php echo $websiteName ?></h1>
<p class='italic bold text-align-left'>Created by <?php echo "$name $lastName" ?></p>
<p class='text-align-right'>Today is <span class='bold italic red-color'><?php echo date("l, F d, Y") ?></span></p>
<p class='text-align-right'>The current time is <span class='bold italic red-color'><?php echo date('h:i') ?></span></p>
<p class='text-align-right'>
  <?php 
    if ($_SESSION["authenticated"] == true){
      echo "<a href='//$_SERVER[HTTP_HOST]/auth/logout.php'>Logout</a>" ;
    } else {
      echo "<a href='//$_SERVER[HTTP_HOST]/auth/login.php'>Login</a>";
      echo "<a href='//$_SERVER[HTTP_HOST]/auth/registration_form.php'>Registration</a>";
    }
    echo "<a href='//$_SERVER[HTTP_HOST]'>Home</a>
  </a>";
  ?>
</p>





<style>
h1 {
    text-align: center;
}
.italic {
    font-style: italic;
}
.bold {
  font-weight:700;
}
.text-align-right {
  text-align: right;
}
.text-align-left {
  text-align: left;
}
.red-color {
    color:red;
}
p a {
  padding-right:10px;
}
</style>