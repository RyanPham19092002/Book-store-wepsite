<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link text = "text/css", rel="stylesheet" href="css/style_list.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>List</title>
</head>
<body>
    <div class="container">

        <!-- Start Nav Bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#" style="font-size: 30px;">BookStore</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" >|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" >Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" >|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Follow us</a>
                    </li>
                </ul>
                
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <!-- End Nav Bar -->

        <!-- Row 2 -->
        <div class="row">
            <!-- Row 2 Column 1 -->
            <aside class="col-md-3 col-sm-12 bg-light">
                <h2>Thể loại</h2>
                <ul>
                    <li><a href="#">Giáo khoa - Tham khảo</a></li>
                    <li><a href="#">RAM</a></li>
                    <li><a href="#">Ổ chứng</a></li>
                    <li><a href="#">ROM</a></li>
                    <li><a href="#">Card - GPU</a></li>
                    <li><a href="#">More...</a></li>
                </ul>
                <h2>Top products</h2>
                <ul>
                    <li><a href="#">Usb Kingston</a></li>
                    <li><a href="#">Ổ cứng di động External SSD</a></li>
                    <li><a href="#">RAM Laptop Samsung 8GB</a></li>
                    <li><a href="#">GTX Geforce 1650</a></li>
                    <li><a href="#">Card Màn Hình EVGA RTX 3090</a></li>
                    <li><a href="#">More...</a></li>
                </ul>
            </aside>
            <!-- Row 2 Column 2 -->
            <div class="col-md-6 col-sm-12">
                <p>
                    <a href="#">Home</a> &gt; <a href="list.php">Giáo khoa - Tham khảo</a>
                </p>
                <h1> Thể loại : Giáo khoa - Tham khảo</h1>
                <br>
                <div class="row" id = "list">
                    <!-- Ajax sẽ phản hồi về đây -->
                </div>
                <!-- Chuyển hướng trang -->
                <div class="container">
                    <ul class="pagination justify-content-end">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
            </div>
            <!-- Row 2 Column 3 -->
            <div class="right col-md-3">
                <p class="text-primary">Welcome</p>
                <p class="text-primary">to</p>
                <p class="text-primary">My Store</p>
            </div>
        </div>
    </div>
    <footer class="bg-dark">
        <p>Footer Infomation...</p>
        <p><a href="#">Link 1</a> | <a href="#">Link 2</a> | <a href="#">Link 3</a></p>
    </footer>
    <script type="text/javascript" src="js/js_list.js"></script>
</body>
</html>