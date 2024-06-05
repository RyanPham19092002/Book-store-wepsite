<?php
include ('./connectDB.php');
$q = "SELECT * FROM user WHERE role_id = 2";
$result = mysqli_query($conn, $q);
$numRows = mysqli_num_rows($result);
mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type = "text/css", rel="stylesheet" href="css/style_create_user.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Create New Accounts</title>
</head>
<body>
    <div class ="container">
        <h1> Tạo tài khoản mới </h1>
        <br>
        <form name="registerForm" method="POST">

            <div class="form-group row">
                <div class="col-9">
                  <input type="hidden" class="form-control col-9" name ="user_id" id="user_id" readonly placeholder="" value="<?php echo $numRows+1; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="user_name" class="col-3 col-form-label">Tên tài khoản:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name ="user_name" id="user_name" placeholder="Nhập tên tài khoản ...">
                </div>
            </div>

            <div class="form-group row">
                <label for="full_name" class="col-3 col-form-label">Tên người dùng:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name="full_name" id="full_name" placeholder="Nhập tên người dùng ...">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-3 col-form-label">Email người dùng:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name="email"  id="email" placeholder="Nhập Email người dùng...">
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-3 col-form-label">Mật khẩu :</label>
                <div class="col-9">
                  <input type="password" class="form-control col-9" name="password" id="password" placeholder="Enter mật khẩu ...">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="c_password" class="col-3 col-form-label">Xác nhận mật khẩu:</label>
                <div class="col-9">
                  <input type="password" class="form-control col-9" name="c_password" id="c_password" placeholder="Xác nhận mật khẩu ...">
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-3 col-form-label">Địa chỉ người dùng:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="address" id="address" placeholder="Nhập địa chỉ người dùng ...">
                </div>
            </div>

            <div class="form-group row">
                <label for="Phone" class="col-3 col-form-label">Số điện thoại người dùng:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="Phone" id="Phone" placeholder="Nhập số điện thoại người dùng ...">
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                  <button name ="btnSubmit" type="submit" class="btn btn-success" id ="btnSubmit" value="adding" onclick="check_user()">Xác nhận</button>
                  <button type="reset" class="btn btn-danger">Hủy</button>
                </div>
            </div>
            <br>
            <br>

        </form>
    </div>
    <script type="text/javascript" src="js/check_user.js"></script>
</body>
</html>