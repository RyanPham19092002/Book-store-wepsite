function img_path(){
    var imgs = document.getElementsByClassName('img');
    var category = document.getElementById('category').value;
    var category_folder;
    if (category == "Giáo khoa - Tham khảo" ){
        category_folder = "Giao_khoa_tham_khao";
    }
    else if (category == "Văn học" ){
        category_folder = "Van_hoc";
    }
    else if (category == "Tâm lý - Kỹ năng sống" ){
        category_folder = "Tam_ly_ky_nang_song";
    }
    else if (category == "Manga - Comic" ){
        category_folder = "Manga_comic";
    }
    else if (category == "Kinh tế" ){
        category_folder = "Kinh_te";
    }

    for (var i = 0; i < imgs.length; i++) {
        var img = imgs[i]; // Lấy phần tử input thứ i
        var imgValue = img.value; // Lấy giá trị của phần tử input
    
        var imgPath = "image/" + category_folder + "/" + imgValue; // Tạo đường dẫn ảnh
    
        img.value = imgPath; // Gán giá trị mới cho phần tử input
      }
}
