<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "bookshop";
$conn = mysqli_connect($servername, $username, $password,$database);

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
    <link type = "text/css", rel="stylesheet" href="css/style_b.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Create New Accounts</title>
</head>
<body>
    <div class ="container">
         <p>
            <a href="home_admin.php">Home</a> &gt; <a href="user.php">Danh sách tài khoản</a> &gt; <a href="create_user.php">Tạo tài khoản mới</a>
        </p>
        <h1> Tạo tài khoản mới </h1>
        <br>
        <form name="registerForm" method="POST">

            <div class="form-group row">
                <label for="user_id" class="col-3 col-form-label">ID of members:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name ="user_id" id="user_id" readonly placeholder="" value="<?php echo $numRows+1; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="user_name" class="col-3 col-form-label">User name of member:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name ="user_name" id="user_name" placeholder="Enter User name of product ...">
                </div>
            </div>

            <div class="form-group row">
                <label for="full_name" class="col-3 col-form-label">Full name of member:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name="full_name" id="full_name" placeholder="Enter Full name of product ...">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-3 col-form-label">Email of member:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name="email"  id="email" placeholder="Enter Email ...">
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-3 col-form-label">Password :</label>
                <div class="col-9">
                  <input type="password" class="form-control col-9" name="password" id="password" placeholder="Enter password ...">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="c_password" class="col-3 col-form-label">Confirm password:</label>
                <div class="col-9">
                  <input type="password" class="form-control col-9" name="c_password" id="c_password" placeholder="Confirm password ...">
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-3 col-form-label">Address of member:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="address" id="address" placeholder="Enter Address of member ...">
                </div>
            </div>

            <div class="form-group row">
                <label for="Phone" class="col-3 col-form-label">Phone of member:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="Phone" id="Phone" placeholder="Enter Phone of member ...">
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                  <button name ="btnSubmit" type="submit" class="btn btn-success" id ="btnSubmit" value="adding" onclick="check_user()">Submit</button>
                  <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div>

        </form>
    </div>
    <script type="text/javascript" src="js/check_user.js"></script>
</body>
</html>