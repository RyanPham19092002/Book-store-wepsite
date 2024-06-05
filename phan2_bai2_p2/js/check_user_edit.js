function check_user_edit(){
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var c_password = document.getElementById("c_password").value;
    var phone = document.getElementById("phone").value;
    var address = document.getElementById("address").value;
    var UserName = document.getElementById("Username").value;
    var FullName = document.getElementById("fullname").value;
    var IDUser = document.getElementById("id").value;
    var oldUserName =  document.getElementById("old_username").value;
    var oldPass =  document.getElementById("old_pass").value;
    var check = 1;
    console.log(email);
    console.log(phone);
    console.log(address);
    console.log(FullName);
    console.log(IDUser);
    console.log(UserName);
    console.log(oldUserName);
    console.log(password);
    console.log(oldPass);
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
            url: 'update_user_succesful.php', 
            type: 'POST',
            data: { // Dữ liệu bạn muốn gửi
                user_id: IDUser,
                email: email,
                password: password,
                oldpassword: oldPass,
                phone: phone,
                address: address,
                user_name: UserName,
                old_user_name: oldUserName,
                full_name: FullName
            },
            success: function(data) {
                console.log(data);
                if (data == 'Success') {
                    alert("Cập tài khoản thành công !!");
                    window.location.href = './index_info_user_and_logout.php';
                    return true
                }
                else if  (data == 'Failed') {
                    alert("Cập nhật tài khoản thất bại !!");
                    return false
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        }
        );
    }
}