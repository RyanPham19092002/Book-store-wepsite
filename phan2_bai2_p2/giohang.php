<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "bookshop";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $database);
include ('./connectDB.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// check list category
$list_cat = "SELECT Category FROM data_bookstore_v3";
$result_list = mysqli_query($conn, $list_cat);

$categories = array();
while ($row = mysqli_fetch_assoc($result_list)) {
    $categories[] = $row['Category'];
}
$categories = array_unique($categories);

 // check list item

$user_name = $_COOKIE['user_name'];
$list_cat = "SELECT cart FROM user WHERE user_name = '$user_name'";
$result_list = mysqli_query($conn, $list_cat);

$row_item = mysqli_fetch_assoc($result_list);

$cart = json_decode($row_item['cart'], true);  // Chuyển đổi chuỗi JSON thành mảng



?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<section class="giohang">
    <div class="container-giohang">
        <div class="giohang-content row">
            <div class="col-8 giohang-content-left">
                <?php 
                    //include './info_cart.php'
                    foreach ($row_item as $key => $json) {
                        // Chuyển đổi chuỗi JSON thành mảng
                        $array = json_decode($json, true);
                        if ($array == NULL) {
                ?>
                <img style='display: block; margin: auto;' src='./image/logo/no-cart.png' class='col-8' alt='No items in cart'>
                <p style="text-align: center;">Chưa có sản phẩm nào trong giỏ</p>
                <?php 
                } else { 
                ?>
                <table>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Giảm giá</th>
                        <th>Thành tiền</th>
                        <th>Xoá</th>
                    </tr>
                    <?php    
                            // Lặp qua mỗi phần tử trong mảng
                            $count = 0;
                            foreach ($array as $item) {
                                // In ra từng phần tử
                                $id_cat = intval($item['id_cat']) ;
                                
                                
                                $id = intval($item['id']);
                                $qty = intval($item['qty']);
                                $category = $categories[$id_cat];
                                $item_info = "SELECT * FROM data_bookstore_v3 WHERE Category = '$category' AND Id = '$id'";
                                $result = mysqli_query($conn, $item_info);

                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td><input type='checkbox' class='count_item' value='" . $count . "' readonly></td>";
                                    echo "<td><img src='" . $row['Link_img_raw'] . "' class='giohang-img-left' alt=''></td>";
                                    echo "<td>" . $row['Name'] . "</td>";
                                    echo "<td><input type='number' class='quantity-input' value='" . $qty . "' min='0'></td>";
                                    echo "<td class='price'>" . $row['Raw_price'] . "đ</td>";
                                    echo "<td class='discount'>" . $row['Discount']*100 . "%</td>";
                                    echo "<td class='total-price'>" . $row['Price'] * $qty . "đ</td>";
                                    echo "<td><button class='remove-item-btn'><i class='fas fa-times'></i></button></td>";
                                    echo "</tr>";
                                    echo "<input class ='username' type='hidden' value='" . $user_name . "'>";
                                    $count += 1;
                                }                           
                            }
                        }
                    }
                    ?>
                </table>
            </div>
            <div class="col-4 giohang-content-right">
                <table>
                    <tr>
                        <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                    </tr>
                    <tr>
                        <td>TỔNG SẢN PHẨM</td>
                        <td id="total-quantity">0</td>
                    </tr>
                    <tr>
                        <td>TỔNG TIỀN HÀNG</td>
                        <td id="total-price">0đ</td>
                    </tr>
                    <tr>
                        <td>Mua thêm để được miễn phí SHIP</td>
                        <td id="additional-amount">0đ</td>
                    </tr>
                </table>
                <div class="giohang-content-right-text">
                    <p>Bạn sẽ được miễn phí ship khi đơn hàng của bạn có tổng giá trị trên 2.000.000 đ</p>             
                </div>
                <div class="giohang-content-right-button">
                    <a href = "./index.php">
                        <button>TIẾP TỤC MUA SẮM</button>
                    </a>
                    <button>THANH TOÁN</button>
                </div>
                <div class="giohang-content-right-dangnhap">
                    <p>TÀI KHOẢN BOOKSTORE : <?php echo $_COOKIE['user_name']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    // Hàm khi bấm nút x
    var removeButtons = document.querySelectorAll('.remove-item-btn');
    removeButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Tìm cột và xoá 
        var row = this.closest('tr');

        var countItem = row.querySelector('.count_item');
        var count = countItem.value;
        console.log(count);

        var user_name_account = document.getElementsByClassName('username')[0].value;
        console.log(user_name_account);


        var quantityInput = row.querySelector('.quantity-input');
        quantityInput.value = 0;


        row.remove();
        // Cập nhật tổng số lượng sản phẩm
        updateTotalQuantity();
        // Cập nhật tổng tiền hàng
        updateTotalPrice();
        $.ajax({
            url: './update_cart.php', // URL của file PHP bạn muốn cập nhật
            type: 'POST',
            data: { // Dữ liệu bạn muốn gửi
                user_name: user_name_account,
                count: count,
            },
            success: function(data) {
                console.log(data);
                if (data == 'Success') {
                    alert("Xóa sản phẩm thành công !!");
                    window.location.href = './tranggiohang.php';
                }
                else {
                    alert("Xóa sản phẩm thất bại !!");
                    window.location.href = './tranggiohang.php';
                }

            }
        }
        );
    });
});
    // Lấy tất cả các checkbox
    var checkboxes = document.querySelectorAll('.count_item');

    // Thêm sự kiện 'change' cho mỗi checkbox
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Cập nhật tổng số lượng sản phẩm và tổng tiền hàng khi checkbox thay đổi trạng thái
            updateTotalQuantity();
            updateTotalPrice();
        });
    });
    // Lắng nghe sự kiện input trên các ô input số lượng
    var quantityInputs = document.querySelectorAll('.quantity-input');
    quantityInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            // Tìm hàng (tr) của ô input
            var row = this.closest('tr');
            // Lấy giá và số lượng từ hàng hiện tại
            var price = parseFloat(row.querySelector('.price').textContent);
            var discount = parseFloat(row.querySelector('.discount').textContent);
            var quantity = parseInt(this.value);
            // Tính toán tổng thành tiền
            var totalPrice = price * quantity * (1-discount/100);
            // Cập nhật tổng thành tiền vào ô Thành tiền
            row.querySelector('.total-price').textContent = totalPrice.toLocaleString() + 'đ'; // Format thành tiền
            // Cập nhật tổng số lượng sản phẩm
            updateTotalQuantity();
            // Cập nhật tổng tiền hàng
            updateTotalPrice();
        });
    });

    // Gọi hàm updateTotalQuantity() khi trang được tải lần đầu
    updateTotalQuantity();
    // Gọi hàm updateTotalPrice() khi trang được tải lần đầu
    updateTotalPrice();

    // Hàm tính tổng số lượng sản phẩm và cập nhật vào ô TỔNG SẢN PHẨM
    function updateTotalQuantity() {
    var totalQuantity = 0;
    quantityInputs.forEach(function(input) {
        var row = input.closest('tr');
        var checkbox = row.querySelector('.count_item');
        if (checkbox.checked) {
            totalQuantity += parseInt(input.value);
        }
    });
    document.getElementById('total-quantity').textContent = totalQuantity;
    document.getElementById('soluong-sp').textContent = totalQuantity;
}

    // Hàm tính tổng tiền hàng 
    function updateTotalPrice() {
        var totalPrice = 0;
        quantityInputs.forEach(function(input) {
            var row = input.closest('tr');
            var checkbox = row.querySelector('.count_item');
            if (checkbox.checked) {
                var price = parseFloat(row.querySelector('.price').textContent);
                var discount = parseFloat(row.querySelector('.discount').textContent);
                var quantity = parseInt(input.value);
                totalPrice += price * quantity * (1-discount/100);
            }
        });
        // Cập nhật tổng tiền hàng vào ô TỔNG TIỀN HÀNG bên phải
        document.getElementById('total-price').textContent = totalPrice.toLocaleString() + 'đ';

        // Tính tiền miễn phí ship
        var freeShippingThreshold = 2000000; // Ngưỡng miễn phí ship
        var additionalAmountForFreeShipping = freeShippingThreshold - totalPrice;
        if (additionalAmountForFreeShipping > 0) {
            // Hiển thị số tiền cần mua thêm để được miễn phí ship
            document.getElementById('additional-amount').textContent = additionalAmountForFreeShipping.toLocaleString() + 'đ';
        } else {
            // Hiển thị "Miễn phí ship"
            document.getElementById('additional-amount').textContent = '0 đ';
        }
    }
</script>
