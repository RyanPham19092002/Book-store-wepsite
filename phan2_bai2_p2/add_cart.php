<?php     
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "bookshop";
    // // Create connection
    // $conn = mysqli_connect($servername, $username, $password, $database);
    include ('./connectDB.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_cat = $_POST['category'];
        $id = $_POST['id'];
        $qty = $_POST['qty'];
        $username = $_POST['username'];
        
        $q = "SELECT cart FROM user WHERE user_name = '$username'";
        $result = mysqli_query($conn, $q);
        $row = mysqli_fetch_assoc($result);
        $current_cart = json_decode(stripslashes($row['cart']), true);

        // Kiểm tra xem mục đã tồn tại trong giỏ hàng hay chưa
        $found = false;
        foreach ($current_cart as &$item) {
            if ($item['id_cat'] == $id_cat && $item['id'] == $id) {
                $item['qty'] += $qty;  // Cập nhật số lượng
                $found = true;
                break;
            }
        }

        // Nếu mục chưa tồn tại trong giỏ hàng, thêm mục mới
        if (!$found) {
            $new_item = array(
                'id_cat' => $id_cat,
                'id' =>  $id,
                'qty' =>  $qty
            );
            $current_cart[] = $new_item;
        }

        // Cập nhật giỏ hàng trong cơ sở dữ liệu
        $cart = json_encode($current_cart);
        $cart = addslashes($cart);
        $q = "UPDATE user SET cart = '$cart' WHERE user_name = '$username'";
            
        if (mysqli_query($conn,$q)) {
            echo "Success"; 
        } else {
            echo "Failed";
        }
        
    }

    mysqli_close($conn);
?>
