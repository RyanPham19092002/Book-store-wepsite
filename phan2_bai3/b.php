<?php 
$arrErr = array();
if(isset($_POST["btnSubmit"])) {
    require 'validation.php';
}
$categorical_page = $_GET['Category'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "bookshop";
$conn = mysqli_connect($servername, $username, $password,$database);

$q = "SELECT * FROM data_bookstore_v3 WHERE Category ='$categorical_page'";
$result = mysqli_query($conn, $q);
$numRows = mysqli_num_rows($result);
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type = "text/css", rel="stylesheet" href="css/style_b.css">
    <title>Create New Products</title>
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
            <div class="errBlock row">
                <div class="col-12">
                    <p class="text-primary text-center font-weight-bold">Complete!</p>
                </div>
            </div>
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "bookshop";
            $conn = mysqli_connect($servername, $username, $password,$database);


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
            // Chuyển đổi $ID thành số nguyên
            // $intID = filter_var($ID, FILTER_VALIDATE_INT);

            // // Chuyển đổi $ID thành số thực
            // $Price = filter_var($Price, FILTER_VALIDATE_FLOAT);
            $q = "INSERT INTO data_bookstore_v3 (ID, Category, Name, Raw_price, Discount, Description, Link_img_raw, Link_img_1, Link_img_2, Link_img_3, Link_img_4)  VALUES ('$ID', '$categorical_page', '$NameProduct', '$Price','$Discount', '$Description', '$Image_raw', '$Image_1', '$Image_2', '$Image_3', '$Image_4')";
            
            mysqli_query($conn,$q);
            mysqli_close($conn);
            ?>
            <?php header("Location: a.php?Category=$categorical_page"); ?>
        <?php } 
        ?>
         <p>
            <a href="home_admin.php">Home</a> &gt; <a href="a.php?Category=<?php echo $categorical_page ;?>"><?php echo $categorical_page ;?></a> &gt; <a href="b.php?Category=<?php echo $categorical_page ;?>">Create New product</a>
        </p>
        <h1> Create new product </h1>
        <br>
        <form name="registerForm" method="POST" action='b.php?Category=<?php echo $categorical_page; ?>'>

            <div class="form-group row">
                <label for="id" class="col-3 col-form-label">ID of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name ="id" id="id" readonly placeholder="" value="<?php echo $numRows+1; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-3 col-form-label">Category of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name ="category" id="category" readonly placeholder="" value="<?php echo $categorical_page; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-3 col-form-label">Name of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name="name" id="name" placeholder="Enter Name of product ...">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-3 col-form-label">Description of product:</label>
                <div class="col-9">
                  <textarea type="text" class="form-control col-9" name="description"  id="description" placeholder="Enter Last name ..."></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="price" class="col-3 col-form-label">Price of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name="price" id="price" placeholder="Enter Price of product ...">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="discount" class="col-3 col-form-label">Discount of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9" name="discount" id="discount" placeholder="Enter Discount of product ...">
                </div>
            </div>

            <div class="form-group row">
                <label for="image_raw" class="col-3 col-form-label">Link image raw of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="image_raw" id="image_raw" placeholder="Enter Link image raw of product ...">
                </div>
            </div>

            <div class="form-group row">
                <label for="image_1" class="col-3 col-form-label">Link image 1 of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="image_1" id="image_1" placeholder="Enter Link image 1 of product ...">
                </div>
            </div>

            <div class="form-group row">
                <label for="image_2" class="col-3 col-form-label">Link image 2 of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="image_2" id="image_2" placeholder="Enter Link image 2 of product ...">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="image_3" class="col-3 col-form-label">Link image 3 of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="image_3" id="image_3" placeholder="Enter Link image 3 of product ...">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="image_4" class="col-3 col-form-label">Link image 4 of product:</label>
                <div class="col-9">
                  <input type="text" class="form-control col-9 img" name="image_4" id="image_4" placeholder="Enter Link image 4 of product ...">
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                  <button name ="btnSubmit" type="submit" class="btn btn-success" id ="btnSubmit" value="adding" onclick="img_path()">Submit</button>
                  <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div>

        </form>
    </div>
    <script type="text/javascript" src="js/img_path.js"></script>
</body>
</html>