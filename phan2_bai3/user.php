<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "bookshop";
$conn = mysqli_connect($servername, $username, $password,$database);
// if (!$conn) {
//     die("Connection failed: ". mysqli_connect_error());
// }
// echo "Connected successfully";
// $q = "SELECT * FROM data_bookstore_v3";
// $result = mysqli_query($conn, $q);


$categorical_page_q = "SELECT * FROM user WHERE role_id = 2" ;
$result  = mysqli_query($conn, $categorical_page_q);
// $categorical_page_row = mysqli_fetch_assoc($categorical_page_result);
// $categorical_page = $categorical_page_row['Category'];



mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link text = "text/css", rel="stylesheet" href="css/style_a.css">
    <title>phan2_bai3</title>
</head>
<body>
    <div class = "container-xl">
         <p>
            <a href="home_admin.php">Home</a> &gt; <a href="user.php">List user</a>
        </p>
        <h1> Danh sách tài khoản</h1>
        <br>
        <!-- <h1>Read products</h1>
        <br> -->
        <button type="button" class="btn btn-success" onclick = "window.location.href='create_user.php'">Tạo tài khoản mới</button>
        <br>
        <br>
        <table>
            <?php 
            echo "<tr><th>User ID</th>
            <th class = 'user_name'>User Name</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Address</th>
            <th>Phone</th></tH>
            <th class='action-column'>Action</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>{$row['user_id']}</td>";
                echo "<td>{$row['user_name']}</td>";
                echo "<td>{$row['full_name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['password']}</td>";
                echo "<td>{$row['address']}</td>";
                echo "<td>{$row['phone']}</td>";
                echo "<td><button type='button' class='btn btn-primary' onclick=\"window.location.href='edit_user.php?id=" . $row['user_id'] . "&username=" . $row['user_name'] . "'\">Edit</button> &nbsp";
                echo "<button type='button' class='btn btn-danger' onclick=\"window.location.href='delete_user.php?id=" . $row['user_id'] . "&username=" . $row['user_name'] . "'\">Delete</button> &nbsp";
            }
            
            ?>
            
        </table>
    </div>
</body>
</html>
