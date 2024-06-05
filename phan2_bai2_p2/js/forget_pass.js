function forget_pass(event) {
    event.preventDefault();
    var email = document.getElementById("email").value;
    var UserName = document.getElementById("user_name").value;
    var FullName = document.getElementById("full_name").value;
    $.ajax({
        url: './check_forget_pass.php', // URL của file PHP bạn muốn cập nhật
        type: 'POST',
        data: { // Dữ liệu bạn muốn gửi
            email: email,
            user_name: UserName,
            full_name: FullName
        },
        success: function(data) {
            console.log(data);
            if (data != 'Failed') {
                document.getElementById("password").value = data; 
            }
            else {
                alert("Thông tin bị sai, yêu cầu nhập lại !!");
                window.location.href = './index_forget.php';
            }

        }
    }
    );
}