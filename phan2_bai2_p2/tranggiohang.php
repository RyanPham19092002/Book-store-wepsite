<?php 
if (!isset($_COOKIE['user_name'])) {
    header('Location: ./index_login.php');
}
else {
    include_once 'header.php';
}
 ?>

<?php include 'giohang.php'; ?>

<?php include_once 'footer.php'; ?>