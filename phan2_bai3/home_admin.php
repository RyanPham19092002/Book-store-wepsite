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
        <h1>Trang Admin</h1>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "bookshop";
        $conn = mysqli_connect($servername, $username, $password, $database);
        
        // Truy vấn cơ sở dữ liệu để lấy danh sách các giá trị Category
        $query = "SELECT DISTINCT Category FROM data_bookstore_v3";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $category = $row['Category'];

        
                // Tạo nút với giá trị Category tương ứng
                echo "<button type='button' class='btn btn-success' onclick=\"window.location.href='a.php?Category=$category'\">$category</button>&nbsp&nbsp";
            }
        }
        
        mysqli_close($conn);
        ?>
        <br>
        <br>
        <button type='button' class='btn btn-danger' onclick="window.location.href='user.php?'">Người dùng</button>
        <br>
        <br>
        <button type='button' class='btn btn-primary' onclick="window.location.href='create_table.php'">Tạo bảng mới</button>
        &nbsp
        <button type='button' class='btn btn-primary' onclick="window.location.href='delete_table.php'">Xóa bảng</button>        
    </div>  
</body>
</html>