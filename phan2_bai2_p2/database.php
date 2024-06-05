<?php
$db_server = 'localhost:3307';  // Địa chỉ máy chủ MySQL
$db_user = 'root';  // Tên cơ sở dữ liệu
$db_name = 'bookshop';  // Tên người dùng MySQL
$db_pass = '';
$conn = "";

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception) {
    echo "Could not connect";
}
?>