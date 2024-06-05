<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <p>
            <a href="home_admin.php">Trang chủ Admin</a> &gt; <a href="delete_table.php">Xóa bảng</a>
        </p>
        <h1>Xóa bảng</h1>
        <br>
        <form name="registerForm" method="POST">
            <div class="form-group row">
                <label for="category" class="col-3 col-form-label">Category tabel:</label>
                <div class="col-9">
                    <input type="text" class="form-control col-9" name ="category" id="category" placeholder="Enter Category want to delete ....">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button name ="btnSubmit" type="submit" class="btn btn-success" id = "btnSubmit" value="edit">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div>
        </form>
        <?php
            if(isset($_POST["btnSubmit"])) {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "bookshop";
                $conn = mysqli_connect($servername, $username, $password, $database);

                $category = $_POST["category"];

                // Kiểm tra xem Category đã tồn tại trong cơ sở dữ liệu chưa
                $checkQuery = "SELECT COUNT(*) as count FROM data_bookstore_v3 WHERE Category = '$category'";
                $checkResult = mysqli_query($conn, $checkQuery);
                $row = mysqli_fetch_assoc($checkResult);
                $count = $row['count'];

                if ($count > 0) {
                    // Xóa category nếu tồn tại
                    $deleteQuery = "DELETE FROM data_bookstore_v3 WHERE Category = '$category'";
                    if (mysqli_query($conn, $deleteQuery)) {
                        echo "Category đã được xóa thành công";
                        header("Location: home_admin.php");
                    } else {
                        echo "Lỗi khi xóa Category: " . mysqli_error($conn);
                    }
                } else {
                    echo "Category không tồn tại trong cơ sở dữ liệu";
                }

                // Trở lại trang home_admin.php
                

                mysqli_close($conn);
            }
        ?>
        
    </div>
</body>
</html>