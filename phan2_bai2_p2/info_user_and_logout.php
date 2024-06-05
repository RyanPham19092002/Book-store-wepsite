<?php 
$username_acc = $_COOKIE['user_name'];

// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "bookshop";
// $conn = mysqli_connect($servername, $username, $password,$database);
include ('./connectDB.php');
$q = "SELECT * FROM user WHERE user_name ='$username_acc'";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);

$Username = $row["user_name"];
$fullname = $row["full_name"];
$email = $row["email"];
$ID = $row["user_id"];
$password = $row["password"];
$address = $row["address"];
$phone = $row["phone"];

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link text = "text/css", rel="stylesheet" href="css/style_c.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Edit User</title>
</head>
<body>
<div class ="container">
        <p>
            <a href="./index.php">Trang chủ</a> &gt; <a href="./index_info_user_and_logout.php">Thông tin người dùng</a>
        </p>
        <h1> Thông tin người dùng  </h1>
        <br>

        <div class="form-group row">
            <label for="Username" class="col-3 col-form-label">Tên tài khoản:</label>
            <div class="col-9">
                <input type="text" class="form-control col-9" name ="Username" id="Username" value="<?php echo $Username; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="fullname" class="col-3 col-form-label">Tên người dùng:</label>
            <div class="col-9">
                <input type="text" class="form-control col-9" name="fullname" id="fullname" value="<?php echo $fullname; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-3 col-form-label">Email người dùng:</label>
            <div class="col-9">
                <input type="text" class="form-control col-9" name="email"  id="email" value="<?php echo $email; ?>">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="address" class="col-3 col-form-label">Địa chỉ người dùng:</label>
            <div class="col-9">
                <input type="text" class="form-control col-9" name="address" id="address" value="<?php echo $address; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-3 col-form-label">Số điện thoại người dùng</label>
            <div class="col-9">
                <input type="text" class="form-control col-9 img" name="phone" id="phone" value="<?php echo $phone; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <a href="./index_edit_user.php">
                    <button name ="btnSubmit" type="submit" class="btn btn-primary" id = "btnSubmit" value="edit"  onclick="check_user_edit()">Chỉnh sửa thông tin người dùng</button>
                </a>
                <a href="./logout.php">
                    <button type="button" class="btn btn-danger">Đăng xuất</button>
                </a>

            </div>
        </div>

        <br>
        <br>


    </div>
    <script type = "text/javascript" src = "js/check_user_edit.js"></script>
</body>
</html>