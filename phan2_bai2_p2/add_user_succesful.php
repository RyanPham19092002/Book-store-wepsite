<?php 
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "bookshop";
// $conn = mysqli_connect($servername, $username, $password,$database);
include ('./connectDB.php');
$ID = $_POST["user_id"];
$UserName = $_POST["user_name"];
$FullName = $_POST["full_name"];
$Email = $_POST["email"];
$Password = $_POST["password"];
$Address = $_POST["address"];
$Phone = $_POST["phone"];
$checkQuery = "SELECT * FROM user WHERE user_name = '$UserName'";
$checkResult = mysqli_query($conn, $checkQuery);
if (mysqli_num_rows($checkResult) > 0) {
    echo 'Failed';
} else {
$q = "INSERT INTO user (user_id, user_name, full_name, email, password, address, phone, role_id)  VALUES ('$ID', '$UserName', '$FullName', '$Email','$Password', '$Address', '$Phone', 2)";
            
mysqli_query($conn,$q);
echo 'Success';
}
mysqli_close($conn);
?>