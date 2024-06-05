<?php 
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "bookshop";
// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $database);
include ('./connectDB.php');
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$Username = $_POST['user_name'];
$full_name = $_POST['full_name'];
$email = $_POST['email'];

$q = "SELECT password FROM user WHERE user_name ='$Username' AND full_name ='$full_name' AND email ='$email'";
$result = mysqli_query($conn, $q);

$row = mysqli_fetch_assoc($result);

if ($row != null){
    echo $row['password'];
}
else {
    echo 'Failed';
}


?>