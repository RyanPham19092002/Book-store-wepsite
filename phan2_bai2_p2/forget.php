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
    <title>Forget Password</title>
</head>
<body>
    <div class ="container">
        <h1> Quên mật khẩu ? </h1>
        <br>
        <form name="registerForm" method="POST">

            <div class="form-group row">
                <label for="user_name" class="col-3 col-form-label">Tên tài khoản:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name ="user_name" id="user_name" placeholder="Nhập tên tài khoản ...">
                </div>
            </div>

            <div class="form-group row">
                <label for="full_name" class="col-3 col-form-label">Tên người dùng:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name="full_name" id="full_name" placeholder="Nhập họ tên người dùng đã đnăg ký...">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-3 col-form-label">Email người dùng:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name="email"  id="email" placeholder="Nhập email người dùng ...">
                </div>
            </div>


            <div class="row">
                <div class="col-12 text-center">
                  <button name ="btnSubmit" type="submit" class="btn btn-success" id ="btnSubmit" value="adding" onclick="forget_pass(event)">Submit</button>
                  <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-3 col-form-label">Mật khẩu người dùng người dùng:</label>
                <div class="col-9">
                    <input type="text" class="form-control col-9" name="password"  id="password" value ="">
                </div>
            </div>

        </form>
        

    </div>
    <script type="text/javascript" src="js/forget_pass.js"></script>
</body>
</html>