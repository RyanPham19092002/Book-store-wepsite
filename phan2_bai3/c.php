<?php 
$arrErr = array();
if(isset($_POST["btnSubmit"])) {
    require 'validation.php';
}
$categorical_page = $_GET['Category'];
$id = $_GET['id'];
$servername = "localhost";
$username = "root";
$password = "";
$database = "bookshop";
$conn = mysqli_connect($servername, $username, $password,$database);
$q = "SELECT * FROM data_bookstore_v3 WHERE ID = $id AND Category ='$categorical_page'";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);
$Image_raw = $row["Link_img_raw"];
$Image_1 = $row["Link_img_1"];
$Image_2 = $row["Link_img_2"];
$Image_3 = $row["Link_img_3"];
$Image_4 = $row["Link_img_4"];
$name = $row["Name"];
$price = $row["Raw_price"];
$ID = $row["ID"];
$description = $row["Description"];
$star_1 = $row["count_star_1"];
$star_2 = $row["count_star_2"];
$star_3 = $row["count_star_3"];
$star_4 = $row["count_star_4"];
$star_5 = $row["count_star_5"];
$discount = $row["Discount"];

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link text = "text/css", rel="stylesheet" href="css/style_c.css">
    <title>Edit</title>
</head>
<body>
<div class ="container">
        <?php if(isset($_POST["btnSubmit"]) && !empty($arrErr)) { ?>
            <div class="errBlock row">
                <label for="err" class="col-3 col-form-label text-right">Kết quả kiểm tra lỗi:</label>
                <ul style="color: red;">
                    <?php
                    foreach ($arrErr as $err) {
                        echo "<li>" . $err . "</li>";
                    }
                    ?>
                </ul>
            </div>
        <?php }
        elseif(isset($_POST["btnSubmit"])) { ?>
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "bookshop";
            $conn = mysqli_connect($servername, $username, $password,$database);

            $category = $_POST["category"];
            $ID = $_POST["id"];
            $NameProduct = $_POST["name"];
            $Description = $_POST["description"];
            $Price = $_POST["price"];
            $Discount = $_POST["discount"]/100;
            $Image_raw = $_POST["image_raw"];
            $Image_1 = $_POST["image_1"];
            $Image_2 = $_POST["image_2"];
            $Image_3 = $_POST["image_3"];
            $Image_4 = $_POST["image_4"];
            $star_1 = $_POST["star_1"];
            $star_2 = $_POST["star_2"];
            $star_3 = $_POST["star_3"];
            $star_4 = $_POST["star_4"];
            $star_5 = $_POST["star_5"];
            if ($category == $categorical_page){
                mysqli_query($conn,"UPDATE data_bookstore_v3 SET Name = '$NameProduct', Raw_price = '$Price', Discount = '$Discount', Description = '$Description', Link_img_raw = '$Image_raw', Link_img_1 = '$Image_1', Link_img_2 = '$Image_2', Link_img_3 = '$Image_3', Link_img_4 = '$Image_4', count_star_1 ='$star_1', count_star_2 ='$star_2', count_star_3 ='$star_3', count_star_4 ='$star_4', count_star_5 ='$star_5' WHERE Category = '$categorical_page' AND ID = '$ID'");
            }
            else {
                $checkCategoryQuery = "SELECT COUNT(*) as count FROM data_bookstore_v3 WHERE Category = '$category'";
                $checkCategoryResult = mysqli_query($conn, $checkCategoryQuery);
                $checkCategoryRow = mysqli_fetch_assoc($checkCategoryResult);
                $categoryExists = $checkCategoryRow['count'] > 0;
                if ($categoryExists) {
                    // Cập nhật product qua bảng category khác
                    $total_id = "SELECT * FROM data_bookstore_v3 WHERE Category ='$category'";
                    $result_id_max = mysqli_query($conn, $total_id);
                    $ID_max = mysqli_num_rows($result_id_max);
                    $ID_new =  $ID_max + 1;
                    $q = "INSERT INTO data_bookstore_v3 (ID, Category, Name, Raw_price, Discount, Description, Link_img_raw, Link_img_1, Link_img_2, Link_img_3, Link_img_4, count_star_1, count_star_2, count_star_3, count_star_4, count_star_5)  VALUES ('$ID_new', '$category', '$NameProduct', '$Price','$Discount', '$Description', '$Image_raw', '$Image_1', '$Image_2', '$Image_3', '$Image_4', '$star_1', '$star_2', '$star_3', '$star_4', '$star_5')";
                    mysqli_query($conn,$q);

                    // Xóa product bên bảng cũ
                    $deleteQuery = "DELETE FROM data_bookstore_v3 WHERE ID = '$ID' AND Category = '$categorical_page'";
                    mysqli_query($conn, $deleteQuery);
        
                    $updateQuery = "UPDATE data_bookstore_v3 SET ID = ID - 1 WHERE Category = '$categorical_page' AND ID > '$ID'";
                    mysqli_query($conn, $updateQuery);
                }
                else {
                    echo "Lỗi: Chưa tạo bảng dữ liệu $category. Vui lòng tạo bảng dữ liệu trước.";;
                }
            }
            
            mysqli_close($conn);
            ?>
            <?php header("Location: a.php?Category=$categorical_page"); ?>
        <?php } 
        ?>
        <p>
        <a href="home_admin.php">Home</a> &gt; <a href="a.php?Category=<?php echo $categorical_page ;?>"><?php echo $categorical_page ;?></a> &gt; <a href="c.php?Category=<?php echo $categorical_page ;?>&id=<?php echo $id; ?>">Edit information</a>
        </p>
        <h1> Edit product information  </h1>
        <br>
        <form name="registerForm" method="POST">

            <div class="form-group row">
                <label for="id" class="col-3 col-form-label">ID of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name ="id" id="id" readonly value="<?php echo $ID; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-3 col-form-label">Category of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name ="category" id="category" value="<?php echo $categorical_page; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-3 col-form-label">Name of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name="name" id="name" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-3 col-form-label">Description of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name="description"  id="description" value="<?php echo $description; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="price" class="col-3 col-form-label">Price of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name="price" id="price" value="<?php echo $price; ?>">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="discount" class="col-3 col-form-label">Discount of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name="discount" id="discount" value="<?php echo $discount; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="image_raw" class="col-3 col-form-label">Link image raw of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="image_raw" id="image_raw" value="<?php echo $Image_raw; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="image_1" class="col-3 col-form-label">Link image 1 of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="image_1" id="image_1" value="<?php echo $Image_1; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="image_2" class="col-3 col-form-label">Link image 2 of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="image_2" id="image_2" value="<?php echo $Image_2; ?>">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="image_3" class="col-3 col-form-label">Link image 3 of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="image_3" id="image_3" value="<?php echo $Image_3; ?>">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="image_4" class="col-3 col-form-label">Link image 4 of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="image_4" id="image_4" value="<?php echo $Image_4; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="star_1" class="col-3 col-form-label">Number of 1 stars product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="star_1" id="star_1" value="<?php echo $star_1; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="star_2" class="col-3 col-form-label">Number of 2 stars product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="star_2" id="star_2" value="<?php echo $star_2; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="star_3" class="col-3 col-form-label">Number of 3 stars product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="star_3" id="star_3" value="<?php echo $star_3; ?>">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="star_4" class="col-3 col-form-label">Number of 4 stars product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="star_4" id="star_4" value="<?php echo $star_4; ?>">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="star_5" class="col-3 col-form-label">Number of 5 stars product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="star_5" id="star_5" value="<?php echo $star_5; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                  <button name ="btnSubmit" type="submit" class="btn btn-success" id = "btnSubmit" value="edit">Submit</button>
                  <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div>

        </form>
    </div>
</body>
</html>