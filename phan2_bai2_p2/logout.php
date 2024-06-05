<?php 
    setcookie("user_name", "", time() - 3600, "/");
    setcookie("password", "", time() - 3600, "/");
    header("Location: ./index_login.php");
?>