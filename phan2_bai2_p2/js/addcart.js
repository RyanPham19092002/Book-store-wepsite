function addcart(has_cookies, category, id, username) {
    console.log(username);
    var qty = document.getElementById("qty").value;
    if (has_cookies == 1) {
        console.log(qty);
        console.log(has_cookies);
        console.log(category);
        console.log(id);
        console.log(username);
        $.ajax({
            url: './add_cart.php',
            type: 'POST',
            data: {username, username, category: category, qty: qty,  id : id},
            success: function(data) {
                console.log(data);
                if (data == "Success") {
                    alert("Đã thêm vào giỏ hàng thành công !");
                }
                else if (data == 'Failed') {
                    alert("Oops !! Đã có lỗi khi thêm vào giỏ hàng.");
                }
            }
        }
        );
    }
}