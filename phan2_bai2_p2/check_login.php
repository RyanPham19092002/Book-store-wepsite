<?php 
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "bookshop";
// $conn = mysqli_connect($servername, $username, $password,$database);
include ('./connectDB.php');
$UserName = $_POST["user_name"];
$Password = $_POST["password"];

$q = "SELECT password FROM user WHERE user_name = '$UserName'";
$result = mysqli_query($conn,$q);
if ($UserName == 'admin@hcmut.edu.vn' && $Password == '123admin') {
    echo 'Admin';
}
else {
    if (mysqli_num_rows($result) > 0) {
        // UserName có trong cơ sở dữ liệu
        $row = mysqli_fetch_assoc($result);
        if ($Password == $row['password']) {
                setcookie('user_name', $UserName, time() + (86400 * 30), "/"); 
                setcookie('password', $Password, time() + (86400 * 30), "/");
                echo 'Member';
            
        } else {
            echo 'Failed';
        }
    } else {
        echo 'Failed';
    }
}

mysqli_close($conn);


?>