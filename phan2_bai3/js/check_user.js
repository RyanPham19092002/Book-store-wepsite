function check_user(){
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var c_password = document.getElementById("c_password").value;
    var phone = document.getElementById("Phone").value.toString();
    var address = document.getElementById("address").value;
    var UserName = document.getElementById("user_name").value;
    var FullName = document.getElementById("full_name").value;
    var IDUser = document.getElementById("user_id").value;
    console.log(email);
    console.log(password);
    console.log(phone);
    console.log(address);
    console.log(UserName);
    console.log(FullName);
    console.log(IDUser);
    var check = 1;
    var re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!re.test(password)) {
        alert('Mật khẩu phải chứa ít nhất một chữ in hoa, một chữ in thường, một số và một ký tự đặc biệt');
        check = 0;
        return false
    }
    if (c_password != password){
        alert("Nhập sai mật khẩu, vui lòng nhập lại !!");
        check = 0;
        return false
    }
    if(email.search(/^.+@.+\..+$/i) == -1) {
        alert("Email chưa đúng định dạng <sth>@<sth>.<sth>");
        check = 0;
        return false
    }
    if(phone.length != 10){
        alert("Số điện thoại chưa đủ 10 số");
        check = 0;
        return false
    }
    if(address.length == 0){
        alert("Phải điền địa chỉ");
        check = 0;
        return false
    }
    if(UserName.length == 0){
        alert("Phải điền tên tài khoản");
        check = 0;
        return false
    }
    if(FullName.length == 0){
        alert("Phải điền tên thành viên");
        check = 0;
        return false
    }
    if(check == 1){
        $.ajax({
            url: 'add_user_succesful.php', // URL của file PHP bạn muốn cập nhật
            type: 'POST',
            data: { // Dữ liệu bạn muốn gửi
                user_id: IDUser,
                email: email,
                password: password,
                phone: phone,
                address: address,
                user_name: UserName,
                full_name: FullName
            },
            success: function(data) {
                console.log(data);
                if (data == 'Success') {
                    alert("Tạo tài khoản thành công !!");
                    window.location.href = 'user.php';
                }
                else if  (data == 'Failed') {
                    alert("Trùng với tên tài khoản đã có. Xin vui lòng chọn tên tài khoản khác !!");
                    return false;
                }

            }
        }
        );
    }
}