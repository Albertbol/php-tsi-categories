<?php
session_start();
$cookie_name = "visits_counter";
if(!isset($_COOKIE[$cookie_name])) {
    setcookie($cookie_name, 1, time() + (86400 * 30), "/"); // 86400 = 1 day    
  } else {
    setcookie($cookie_name, $_COOKIE[$cookie_name] + 1, time() + (86400 * 30), "/");
    echo "Visits: " . $_COOKIE[$cookie_name];
  }
?>