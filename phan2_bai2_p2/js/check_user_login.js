function check_user_login(){
    var password = document.getElementById("password_login").value;
    var user_name = document.getElementById("username_login").value;
    $.ajax({
        url: './check_login.php',
        type: 'POST',
        data: {password: password, user_name: user_name},
        success: function(data) {
            console.log(data);
            if (data == 'Member') {
                alert("Đăng nhập tài khoản thành công !!");
                window.location.href = './index.php';
            }
            else if (data == 'Failed') {
                alert("Mật khẩu hoặc tài khoản không đúng, vui lòng kiểm tra lại !!");
                window.location.href = './index_login.php';
            }
            else if (data == 'Admin') {
                window.location.href = '../phan2_bai3/home_admin.php';
            }
        },
        error: function (xhr, status, error) {
            console.log("AJAX request failed.");
            console.log("Status:", status);
            console.log("Error:", error);
            console.log("Response Text:", xhr.responseText);
        }
    }
    );
}