<?php
require_once 'connectDB.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="container justify-content-center login">
        <div class= "row col-10 login">
            <div class="col-8">
                <div class="form-content login">
                    <img src="./image/logo/logo.jpg" alt="logging" >
                </div>
            </div>

            <div class="form-input form-input2 col-4 login">
                <h2>Đăng Nhập</h2>
                <form method="POST">
                    <div class="form-group">
                        <input class="styled-input login" type="input" id="username_login" name="username_login" required placeholder = "Tài khoản">
                    </div>
                    <div class="form-group">
                        <input class="styled-input login" type="password" id="password_login" name="password_login" required placeholder = "Mật khẩu">
                    </div>
                    <div class="row">
                        <!-- <div class="remember col-6">
                            <input type="checkbox" name="Remember" id = "Remember" /> Lưu mật khẩu
                        </div> -->
                        <div class="forgot-password fs14 text-end mt10 col-6 login">
                            <a class="forget_pass" href="./index_forget.php">Quên mật khẩu?</a>
                        </div>
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-success login" onclick="check_user_login()">Đăng nhập</button>
                    <br>
                    <div class="register fs14 text-center mt20">
                        Bạn chưa phải là thành viên?
                        <a href="./index_register.php" class="d-block">Đăng ký</a>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <script type="text/javascript" src="js/check_user_login.js"></script> 
</body>
</html>