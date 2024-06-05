<?php
if (isset($_COOKIE['user_name'])) {
    $Username = $_COOKIE['user_name'];
    $link_buy = './tranggiohang.php';
    $link_info_and_logout = './index_info_user_and_logout.php';
}
else {
    $Username ="Tài khoản";
    $link_buy = './index_login.php';
    $link_info_and_logout = './index_login.php';

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Book Store</title>
</head>
<body>
    <header>
        <div class="mainheader">
            <div class="contentheader">
                    <div class="logo">
                        <a href="./home.php">
                            <img src="image/logo/logo.jpg">
                        </a>
                    </div>
                    <div class="content">
                        <div class="topcontent">
                            <div class="col-7">
                                <div class="search">
                                    <div class="style-search">
                                        <div class="insearch">
                                            <form action="product.php" method="GET">
                                                <img src="./image/logo/icon-search.png" alt="">
                                                <input type="hidden" name="act" value="search" />
                                                <input type="text" placeholder="Bạn tìm gì hôm nay" class="text-search"
                                                    name="search" value="<?php if (isset($_GET['search']))
                                                        echo $_GET['search']; ?>">
                                                <!-- <button class="button">
                                                Tìm kiếm
                                            </button> -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="icon">
                                    <div class="col-2 trangchu">
                                        <img src="./image/logo/home.png" alt="home">
                                       <a href="./index.php">Trang chủ</a>
                                    </div> 
                                    <div class="col-2 lienhe">
                                       <img src="./image/logo/aboutus.png" alt="lienhe">
                                       <a href="./tranglienhe.php">Liên hệ</a>
                                    </div>
                                    <div class="col-2 about">
                                       <img src="image/logo/aboutus.png" alt="about">
                                       <a href="./trangabout.php">About Us</a>
                                    </div>
                                    <div class="col-2 new">
                                       <img src="./image/logo/new.png" alt="new">
                                       <a href="./trangtintuc.php">Tin tức</a>
                                    </div>
                                    <div class="col-2 taikhoan">
                                       <img src="./image/logo/tk.png" alt="taikhoan">
                                       <a href="<?php echo $link_info_and_logout;?> "><?php echo $Username; ?></a>
                                    </div>
                                    <div class="col-2 giohang-header">
                                        <a href="style-giohang">
                                            <div class="icon-giohang">
                                                <div class="i-giohang">
                                                    <a href="<?php echo $link_buy ;?>">
                                                        <img class="giohang-img" src="./image/logo/giohang.png" alt="giohang">
                                                    </a>
                                                    <span class="giohang-span" id="soluong-sp">0</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="botcontent">
                            <div class="col-md-7">
                                <div class="danhmuc">
                                    <a href="index.php?Category=Manga - Comic&page=1">Manga - Comic</a>
                                    <a href="index.php?Category=Tâm lý - Kỹ năng sống&page=1">Tâm lý & Kỹ năng sống</a>
                                    <a href="index.php?Category=Tôn giáo&page=1">Tôn giáo</a>
                                    <a href="index.php?Category=Văn học&page=1">Văn học</a>
                                    <a href="index.php?Category=Lịch sử&page=1">Lịch sử</a>
                                    <a href="index.php?Category=Giáo khoa - Tham khảo&page=1">Giáo khoa - Tham khảo</a>
                                    <a href="index.php?Category=Tiểu sử & Tự truyện&page=1">Tiểu sử & Tự truyện</a>
                                    <a href="index.php?Category=Kinh tế&page=1">Kinh tế</a>
                                    <a href="index.php?Category=Nấu ăn&page=1">Nấu ăn</a>
                                    <a href="index.php?Category=Khoa học công nghệ&page=1">Khoa học công nghệ</a>
                                    <a href="index.php?Category=Truyền cảm hứng&page=1">Truyền cảm hứng</a>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="diachi">
                                    <img src="./image/logo/icon-diachi.jpg" alt="icon-diachi">
                                    <h4>Giao đến:</h4>
                                    <div class="dia-chi">Chọn nơi bạn muốn giao đến?</div>
                            </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>      
    </header>
</body>

