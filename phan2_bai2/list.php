<?php
if (!isset($_GET['page'])) {
    // Gán giá trị mặc định cho id
    $_GET['page'] = 1;
    $_GET['Category'] = "Giáo khoa - Tham khảo";
}

// Trích xuất giá trị id
$id_page = $_GET['page'];
$categorical_page = $_GET['Category'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "bookshop";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

$list_category = "SELECT * FROM data_bookstore_v3 WHERE ID = 1";
$list_category_result = mysqli_query($conn, $list_category);


$q = "SELECT * FROM data_bookstore_v3 WHERE Category ='$categorical_page'";
$result = mysqli_query($conn, $q);
$numRows = mysqli_num_rows($result);
$numTabs = ceil($numRows / 9);


// if (!$result) {
//     die('Error in query: ' . mysqli_error($con));
// }
// while ($row = mysqli_fetch_assoc($result)) {
//     echo $row['image'];
// }
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/style_list.css"> 
    <title>Lab phan1_bai1 - Phạm Thanh Phát - 2010506</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <!-- Row 2 Column 1 -->
            <aside class="col-md-3 col-sm-12">
                <p>
                    <a href="index.php">Trang chủ</a> &gt; <a href="index.php?Category=<?php echo $categorical_page ;?>&page=1"><?php echo $categorical_page ;?></a>
                </p>
                <div class = "categorical_list">
                    <h2>Thể loại</h2>
                    <ul >
                        <?php
                        while ($category_row_list = mysqli_fetch_assoc($list_category_result)) {
                                $list_category_row = $category_row_list["Category"];
                        ?>
                            <li><a href="index.php?Category=<?php echo $list_category_row ;?>&page=1"><?php echo $list_category_row ;?></a></li>
                        <?php 
                        } ?>
                    </ul>
                </div>
            </aside>
            <!-- Row 2 Column 2 -->
            <div class="col-md-9 col-sm-12">
                <h1> Thể loại : <?php echo $categorical_page ;?></h1>
                <br>
                <div class="row justify-content-between">
                    
                    <?php 
                    while ($row = mysqli_fetch_assoc($result)) {
                        $image = $row["Link_img_raw"];
                        $name = $row["Name"];
                        $price = $row["Price"];
                        $raw_price = $row["Raw_price"];
                        $discount = $row["Discount"];
                        $id = $row["ID"];
                        $categorical_page = $row['Category'];
                        if (9*$id_page >= $id && ($id_page-1)*9 < $id) {
                        ?>
                        <div class="card col-3-5">
                            <br>   
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
                            <button type="button" class="btn btn-success" onclick = "window.location.href='detail_index.php?Category=<?php echo $categorical_page; ?>&id=<?php echo $id; ?>'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                </svg>&nbsp
                            Mua ngay</button>
                            <br>
                        </div>
                            
                        <?php }} ?>
                </div>
                <!-- Chuyển hướng trang -->
            </div>
            <div class="container">
                    <ul class="pagination justify-content-center">
                        <?php       

                        for ($i = 1; $i <= $numTabs; $i++) {
                            $isActive = ($i == $id_page) ? 'active' : '';
                            echo '<li class="page-item ' . $isActive . '"><a class="page-link" href="index.php?Category=' . $categorical_page . '&page=' . $i . '">' . $i . '</a></li>';
                        }                      
                        ?>
                    </ul>
            </div>
        </div>
    </div>

</body>

</html>