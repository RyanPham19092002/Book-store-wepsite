<?php     
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "bookshop";
    // // Create connection
    // $conn = mysqli_connect($servername, $username, $password, $database);
    include ('./connectDB.php');
     // check list item
    $username = $_POST['user_name'];
    $count = $_POST['count'];
    $list_cat = "SELECT cart FROM user WHERE user_name = '$username'";
    $result_list = mysqli_query($conn, $list_cat);

    $row = mysqli_fetch_assoc($result_list);

    $cart = json_decode($row['cart'], true);  // Chuyển đổi chuỗi JSON thành mảng

    unset($cart[$count]);  // xóa phần tử thứ count

    $cart = array_values($cart); // reset thứ tự phần tử

    // Chuyển đổi mảng thành chuỗi JSON
    $new_cart = json_encode($cart);

    // Cập nhật cơ sở dữ liệu
    $query = "UPDATE user SET cart = '$new_cart' WHERE user_name = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Success";
    } else {
        echo "Failed";
    }
    
    

mysqli_close($conn);
?>
