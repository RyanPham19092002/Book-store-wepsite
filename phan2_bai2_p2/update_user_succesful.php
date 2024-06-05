<?php 
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "bookshop";
// $conn = mysqli_connect($servername, $username, $password,$database);

include ('./connectDB.php');
$ID = $_POST["user_id"];
$UserName = $_POST["user_name"];
$OldUserName = $_POST["old_user_name"];
$FullName = $_POST["full_name"];
$Email = $_POST["email"];
$Password = $_POST["password"];
$OldPass =  $_POST["oldpassword"];
$Address = $_POST["address"];
$Phone = $_POST["phone"];
$checkQuery = "SELECT * FROM user WHERE user_name = '$UserName' AND user_id != '$ID'";
$checkResult = mysqli_query($conn, $checkQuery);
if (mysqli_num_rows($checkResult) > 0) {
    // Nếu có kết quả, thì $UserName đã tồn tại
    echo 'Failed';
} else {
$q = "UPDATE user SET user_name = '$UserName', full_name = '$FullName', email = '$Email', password = '$Password', address = '$Address', phone = '$Phone' WHERE user_id = '$ID'";
mysqli_query($conn,$q);
if (isset($_COOKIE['user_name']) && isset($_COOKIE['password'])) {
    $user_cookie = $_COOKIE['user_name'];
    $pass_cookie = $_COOKIE['password'];
    if ($user_cookie == $OldUserName) {
        if ($user_cookie != $UserName || $pass_cookie != $Password) {
            setcookie("user_name","", time() - (86400 * 30), "/");
            setcookie("password", "", time() - (86400 * 30), "/");
        }
        // setcookie("user_name", $UserName, time() + (86400 * 30), "/");
        // setcookie("password", $Password, time() + (86400 * 30), "/");
    }
}

echo 'Success'; 
}
mysqli_close($conn);


?>