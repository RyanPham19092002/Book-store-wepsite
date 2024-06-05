<?php 
$id = $_GET['id'];
$categorical_page = $_GET['Category'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link text = "text/css", rel="stylesheet" href="css/style_d.css">
    <title>Document</title>
</head>
<body>
    <div class ="container">
        <h1> Bạn có chắc rằng muốn xóa record này không ? </h1>
        <?php if(isset($_POST["btnSubmit"])) { 
            echo $_POST["btnSubmit"];
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "bookshop";
            $conn = mysqli_connect($servername, $username, $password,$database);
            
            $deleteQuery = "DELETE FROM data_bookstore_v3 WHERE ID = '$id' AND Category = '$categorical_page'";
            mysqli_query($conn, $deleteQuery);

            $updateQuery = "UPDATE data_bookstore_v3 SET ID = ID - 1 WHERE Category = '$categorical_page' AND ID > '$id'";
            mysqli_query($conn, $updateQuery);

            mysqli_close($conn);

            header("Location: a.php?Category=$categorical_page"); 
        } 
        if(isset($_POST["btnSubmitNO"])) { 
            header("Location: a.php?Category=$categorical_page"); 
        }?>
        <form name="registerForm" method="POST">
            <div class="row">
                <div class="col-12 text-center">
                    <button name ="btnSubmit" type="submit" class="btn btn-success" id = "btnSubmit">Có</button>
                    <button name ="btnSubmitNO" type="submit" class="btn btn-danger" id = "btnSubmitNO">Không</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>