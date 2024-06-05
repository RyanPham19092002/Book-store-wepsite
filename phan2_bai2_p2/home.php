<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <script>
        $(document).ready(function () {
            let numProduct = 12;
            $("button").click(function () {
                numProduct = numProduct + 12;
                $("#mainProducts").load("load-product.php", {
                    numProductNew: numProduct
                });
            });
        });
    </script>
</head>

<body>
    <?php include "header.php" ?>

    <div class="container">
        <div class="row">
            <img style="height: 200px" class="image-fluid" src="./image/logo/ads2.jpg" alt="ads" />
        </div>

        <ol class="breadcrumb" style="margin-top: 16px; margin-bottom: 0; margin-left: -12px; margin-right: -12px">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
        </ol>

        <div class="row" style="margin-top: 0; padding: 0; margin-bottom: 16px">
            <div class="col-xl-2 col-12 box rounded-4 ">


                <h3>Danh mục</h3>
                <?php include "distincCate.php" ?>
            </div>

            <div class="col box rounded-4 gx-4 mx-2">
                <div id="mainProducts" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" style="margin: 5px">
                    <?php
                    include ("./connectDB.php");
                    $sql = "SELECT * FROM data_bookstore_v3 ORDER BY ID DESC LIMIT 12 ";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $name = $row['Name'];
                            $price = $row['Price'];
                            $rawPrice = $row['Raw_price'];
                            $image = $row['Link_img_raw'];
                            $id = $row['ID'];
                            $category = $row['Category']; 
                            $truncatedTitle = (strlen($name) > 80) ? substr($name, 0, 50) . '...' : $name;

                            echo '<div class="col">';
                            echo '<div class="card" style="height: 400px;">';
                            echo '<div style="height: 60%; text-align: center;">';
                            echo '<a href="./detail_index.php?Category=' . $category .'&id=' .$id.'"><img  src="' . $image . '" class="card-img-top" alt="' . $name . '" style="height: 100%; object-fit: contain;"></a>';
                            echo '</div>';

                            echo '<div class="card-body">';
                            echo '<p class="card-title">' . $truncatedTitle . '</p>';
                            echo '<div style="color: red;">' . $price . ' đ</div>';
                            echo '<div style="color: grey; text-decoration: line-through;">' . $rawPrice . ' đ</div>';

                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }

                    }
                    mysqli_close($conn);
                    ?>
                </div>
                <div style="display: flex;align-items: center;justify-content: center;">
                    <button class="btn" style="text-decoration: underline; color: blue">Xem thêm</button>
                </div>
            </div>

            <div class="col-lg-3 col-xl-2 col-12 box rounded-4 gx-4">
                <div>
                    <h3 stype="color: red;">Top sales</h3>
                    <?php include 'displayProduct.php' ?>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php" ?>
</body>

</html>