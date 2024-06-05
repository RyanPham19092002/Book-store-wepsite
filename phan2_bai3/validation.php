<?php 
// $categorical_page = $_GET['Category'];
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "bookshop";
// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $database);

// $q = "SELECT * FROM data_bookstore_v3 WHERE Category ='$categorical_page'";
// $result = mysqli_query($conn, $q);
// $numRows = mysqli_num_rows($result);
// $arrErr = array();

// $ID = $_POST["ID"];
$NameProduct = $_POST["name"];
$Description = $_POST["description"];
// $Price = $_POST["Price"];
$Raw_price = $_POST["price"];
$Discount = $_POST["discount"];
$Image = $_POST["image_raw"];
$Image1 = $_POST["image_1"];
$Image2 = $_POST["image_2"];
$Image3 = $_POST["image_3"];
$Image4 = $_POST["image_4"];


// Kiểm tra xem ID được nhập đã có chưa, nếu có yêu cầu nhập lại
// $sql = "SELECT * FROM data_bookstore_v1 WHERE ID = $ID";
// $result = mysqli_query($conn, $sql);
// echo $Condition;
// if ($Condition == "adding") {

//     if (mysqli_num_rows($result) > 0) {
//         // ID đã tồn tại trong cơ sở dữ liệu
//         array_push($arrErr, "ID đã tồn tại. Vui lòng sửa ID.");
//     } 
//     // Đóng kết nối
    
// }


// Chuyển đổi $ID thành số nguyên
// $intID = filter_var($numRows+1, FILTER_VALIDATE_INT);

// Chuyển đổi $price thành số thực
$Price = filter_var($Raw_price, FILTER_VALIDATE_FLOAT);

// if ($intID == false || $intID <= 0) {
//     array_push($arrErr, "ID của sản phẩm phải là số nguyên dương");
// }

// } elseif ($floatID !== false) {
//     echo "Biến là một số thực: " . $floatID;
// } else {
//     echo "Không thể chuyển đổi biến thành số.";
// }

if(strlen($NameProduct) < 5 || strlen($NameProduct) > 200) {
        array_push($arrErr, "Tên của sản phẩm phải có từ 5 - 200 kí tự");
}

if(strlen($Description) > 10000) {
        array_push($arrErr, "Mô tả của sản phẩm phải có độ dài tối đa 5.000 kí tự!");
}

if ($Price == false || $Price <= 0) {
    array_push($arrErr, "Giá tiền của sản phẩm phải là số không âm");
}


// if(strlen($Image) > 255) {
//     array_push($arrErr, "Đường dẫn hình ảnh của sản phẩm phải có độ dài tối đa 255 kí tự");
    
// }
// mysqli_close($conn);
?>