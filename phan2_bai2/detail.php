<?php 
    $categorical_page = $_GET['Category'];  
    $id = $_GET['id'];
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bookshop";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    //     }
    //     echo "Connected successfully";     
    
    
    $list_category = "SELECT * FROM data_bookstore_v3 WHERE ID = 1";
    $list_category_result = mysqli_query($conn, $list_category);

    $random_list_item = "SELECT * FROM data_bookstore_v3 WHERE Category = '$categorical_page' ORDER BY RAND() LIMIT 4";
    $random_list_item_result = mysqli_query($conn, $random_list_item);

    $q = "SELECT * FROM data_bookstore_v3 WHERE ID = $id AND Category = '$categorical_page'";
    $result = mysqli_query($conn, $q);
    $row = mysqli_fetch_assoc($result);
    $image = $row["Link_img_raw"];
    $image1 = $row["Link_img_1"];
    $image2 = $row["Link_img_2"];
    $image3 = $row["Link_img_3"];
    $image4 = $row["Link_img_4"];
    $name = $row["Name"];
    $price = $row["Price"];
    $raw_price = $row["Raw_price"];
    $discount = $row["Discount"];
    $id = $row["ID"];
    $description = $row["Description"];
    $category = $row["Category"];

    $count_star_1 = $row["count_star_1"];
    $count_star_2 = $row["count_star_2"];
    $count_star_3 = $row["count_star_3"];
    $count_star_4 = $row["count_star_4"];
    $count_star_5 = $row["count_star_5"];
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/style_detail1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Lab phan1_bai2 - Phạm Thanh Phát - 2010506</title>
</head>
<body>

    <div class="container">

        <!-- Row 2 -->
        <div class="row">        
            <!-- Row 2 Column 2 -->
            <div class="col-md-12 col-sm-12">
                <div class="row col-12">
                    <p>
                        <a href="index.php">Home</a> &gt; <a href="index.php?Category=<?php echo $categorical_page ;?>&page=1"><?php echo $category; ?></a> &gt; <a href="detail.php?Category=<?php echo $categorical_page ;?>&id=<?php echo $id ;?>"><?php echo $name; ?></a>
                    </p>
                </div>  
                <div class="row col-12">
                    <div class="col-md-5">
                        <div class="box-large">
                            <div class="boxbot">
                                <div style="width:100%"><img class="img-main" src="<?php echo $image;?>" alt="img"></div>                                 
                            </div>
                            <div class="boxbot">
                            <?php
                                if ($image1 != null) {
                                    echo '<div style="width:25%"><img class="img-main" src="' . $image1 . '" alt="img"></div>';
                                }
                                if ($image2 != null) {
                                    echo '<div style="width:25%"><img class="img-main" src="' . $image2 . '" alt="img"></div>';
                                }
                                if ($image3 != null) {
                                    echo '<div style="width:25%"><img class="img-main" src="' . $image3 . '" alt="img"></div>';
                                }
                                if ($image4 != null) {
                                    echo '<div style="width:25%"><img class="img-main" src="' . $image4 . '" alt="img"></div>';
                                }
                            ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 summary">
                        <h3><?php echo $name; ?></h3>
                        <h6>Danh mục : <a href="index.php?Category=<?php echo $categorical_page ;?>&page=1"><?php echo $category; ?></a></h6>
                        <h3 class="d-inline">Giá tiền : </h3><h3 class="price d-inline"><?php echo ($raw_price*(1-$discount)); ?> <sup>đ</sup></h3>
                        <h6><del><?php echo $raw_price; ?> <sup>đ</sup></del>&nbsp<span class="badge badge-pill badge-danger">Giảm <?php echo $discount*100;?>%</span></h6>
                        <br>
                        <div id="count-product-details">
                            <div class="product-view-qiantity-box">
                                <label for="qty">Số lượng :</label>&nbsp &nbsp
                                    <div class="product-view-quantity-box-block">
                                        <a class="btn quantity-arrow-minus" type="submit" name="sub" onclick="subQty();"> - </a>
                                        <input type="text" name="qty" id="qty" maxvalue="999" minvalue="1" style="text-align:center" value="1" title="SL" onkeypress="ValidateInput(event)" onblur="checkQtyValue();" class="input-text qty">
                                        <a class="btn quantity-arrow-plus" type="submit" name="add" onclick="addQty();"> + </a>
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-success add d-block w-100" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                </svg>&nbsp
                                    Thêm vào giỏ hàng
                                </button>
                            </div>
          
                            <div class="col-6">
                                <button class="btn btn-success buy d-block w-100" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                                    <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                </svg>&nbsp
                                    Mua ngay
                                </button>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row col-12" style="margin-top: 25px">
                    <h3>BookStore Hải An xin giới thiệu</h3>
                    <br><br>
                    <div class="row justify-content-between">
                        <?php 
                            while ($row_random_list_item_result = mysqli_fetch_assoc($random_list_item_result)) {
                                $image = $row_random_list_item_result["Link_img_raw"];
                                $name = $row_random_list_item_result["Name"];
                                $price = $row_random_list_item_result["Price"];
                                $raw_price = $row_random_list_item_result["Raw_price"];
                                $discount = $row_random_list_item_result["Discount"];
                                $id = $row_random_list_item_result["ID"];
                                $categorical_page = $row_random_list_item_result['Category'];
                                ?>
                            <div class="card col-2-5">   
                                <a  href ="detail_index.php?Category=<?php echo $categorical_page; ?>&id=<?php echo $id; ?>" >                        
                                    <img class="card-img-top" src="<?php echo $image;?>" alt="img" style="width:100%; height:200px; object-fit: cover;">
                                </a>
                                <div class="card-body">
                                    <h6 class="text-muted"><?php echo $name; ?></h6>
                                </div>
                                <div class="card-footer">
                                    <h4 class="price"><?php echo ($raw_price*(1-$discount)); ?><sup>đ</sup>&nbsp<span class="badge badge-pill badge-danger">-<?php echo $discount*100;?>%</span></h4>
                                    <h6><del><?php echo $raw_price; ?> <sup>đ</sup></del></h6>
                                </div>
                                <!-- <button type="button" class="btn btn-success" onclick = "window.location.href='detail_index.php?Category=<?php echo $categorical_page; ?>&id=<?php echo $id; ?>'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                    </svg>&nbsp
                                Mua ngay</button> -->
                            </div>
                        <?php } ?>
                    </div>
                </div>                   
                <div class="row col-12" style="margin-top: 25px">
                    <h3>Mô tả sản phẩm</h3>
                    <p>
                        <?php echo $description; ?>
                    </p>
                </div>
                <div class="row col-12" style="margin-top: 25px">
                    <h3>Đánh giá sản phẩm</h3>
                    <div class="row col-6" style="margin-top: 25px">
                         <?php 
                         $total =  $count_star_1 + $count_star_2*2 + $count_star_3*3 + $count_star_4*4 + $count_star_5*5;
                         $total_count = $count_star_1 + $count_star_2 + $count_star_3 + $count_star_4 + $count_star_5;

                         if ($total_count != 0) {
                            $evaluate = number_format($total/$total_count,1);
                            $percent_start_1 = number_format(100*$count_star_1/$total_count,1);
                            $percent_start_2 = number_format(100*$count_star_2/$total_count,1);
                            $percent_start_3 = number_format(100*$count_star_3/$total_count,1);
                            $percent_start_4 = number_format(100*$count_star_4/$total_count,1);
                            $percent_start_5 = number_format(100*$count_star_5/$total_count,1);
                         }
                         else {
                            $evaluate = 0;
                            $percent_start_1 = 0;
                            $percent_start_2 = 0;
                            $percent_start_3 = 0;
                            $percent_start_4 = 0;
                            $percent_start_5 = 0;
                         }
                         $array_per = [$percent_start_1, $percent_start_2, $percent_start_3, $percent_start_4, $percent_start_5];
                         ?>
                        
                        <div class="col-6">
                            <div class="d-flex align-items-baseline justify-content-center">
                                <h3><?php echo $evaluate; ?></h3>/5
                                &nbsp
                                <h6>(<?php echo $total_count; ?> đánh giá)</h6>
                            </div>
                        </div>
                        <div class="col-6">
                        <?php
                        for ($i = 5; $i >= 1; $i--) {
                            echo '<div>';
                            for ($j = 1; $j <= 5; $j++) {
                                if ($j <= $i) {
                                    echo '<span class="fa fa-star checked"></span>';
                                } else {
                                    echo '<span class="fa fa-star"></span>';
                                }
                            }
                            echo '<span>&nbsp:&nbsp' . $array_per[$i-1] . ' %</span>';
                            echo '</div>';
                        }
                        ?>
                        </div>
                    </div>
                    <div class="row col-6" style="margin-top: 25px">
                        <h3>Viết đánh giá</h3>
                        <form class="feedback" method="POST" action="#">
                            <span>Đánh giá sản phẩm</span>
                            &nbsp
                            <span class="fa fa-star rating" onclick="toggleStar(0)"></span>
                            <span class="fa fa-star rating" onclick="toggleStar(1)"></span>
                            <span class="fa fa-star rating" onclick="toggleStar(2)"></span>
                            <span class="fa fa-star rating" onclick="toggleStar(3)"></span>
                            <span class="fa fa-star rating" onclick="toggleStar(4)"></span>

                            <div class="mb-3">
                                <label for="Comment" class="form-label">Nhận xét</label>
                                <textarea class="form-control" id="Comment"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                            <button type="reset" class="btn btn-gray" onclick="removeStars()">Hủy</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/SL.js"></script>
    <script type="text/javascript" src="js/feedback.js"></script>
</body>
</html>