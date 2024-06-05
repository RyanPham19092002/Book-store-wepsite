<?php 

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



$Price = filter_var($Raw_price, FILTER_VALIDATE_FLOAT);

// if ($intID == false || $intID <= 0) {
//     array_push($arrErr, "ID của sản phẩm phải là số nguyên dương");
// }

// } elseif ($floatID !== false) {
//     echo "Biến là một số thực: " . $floatID;
// } else {
//     echo "Không thể chuyển đổi biến thành số.";
// }

if(strlen($NameProduct) < 5 || strlen($NameProduct) > 500) {
        array_push($arrErr, "Tên của sản phẩm phải có từ 5 - 40 kí tự");
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