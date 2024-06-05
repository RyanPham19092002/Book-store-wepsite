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
    <!-- <link rel="stylesheet" type="text/css" href="./css/sidebar.css"> -->
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <script src="js/simple-bootstrap-paginator.js"></script>
</head>

<body>
    <?php include "header.php" ?>

    <div class="container">
        <?php
        include_once ("./connectDB.php");
        $search = $_GET['search'];
        $perPage = 12;
        $sql = "SELECT DISTINCT Name, Price, Raw_price, Link_img_raw, ID FROM data_bookstore_v3 WHERE Name like '%$search%' ORDER BY ID DESC";
        $result = mysqli_query($conn, $sql);
        $totalRecords = mysqli_num_rows($result);
        $totalPages = ceil($totalRecords / $perPage);
        echo "<script>console.log('total records: " . $totalRecords . "')</script>";
        ?>
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
                <h3 class="txt-medium ms-3">
                    TẤT CẢ SẢN PHẨM
                </h3>
                <div id="mainProducts" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" style="margin: 5px">

                </div>
                <div id="pagination"></div>
                <input type="hidden" id="totalPages" value="<?php echo $totalPages; ?>">
                <input type="hidden" id="searchQuery" value="<?php echo $search; ?>">
            </div>

            <div class="col-lg-3 col-xl-2 col-12 box rounded-4 gx-4">
                <div>
                    <h3 stype="color: red;">Top sales</h3>
                    <?php include 'displayProduct.php' ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var totalPage = parseInt($('#totalPages').val());
            var searchQuery = $('#searchQuery').val();
            var pag = $('#pagination').simplePaginator({
                totalPages: totalPage,
                maxButtonsVisible: 5,
                currentPage: 1,
                nextLabel: 'Next',
                prevLabel: 'Prev',
                firstLabel: 'First',
                lastLabel: 'Last',
                clickCurrentPage: true,
                pageChange: function (page) {
                    $("#mainProducts").html('<strong>loading...</strong>');
                    console.log('Sending AJAX request');
                    console.log("Search Query:", searchQuery);
                    $.ajax({
                        url: "load_search_product.php",
                        method: "POST",
                        dataType: "json",
                        data: { page: page, searchQuery: searchQuery },
                        success: function (responseData) {
                            try {
                                console.log(responseData);
                                $('#mainProducts').html(responseData.html);
                            } catch (e) {
                                console.log("Output is not valid JSON: " + data);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.log("AJAX request failed.");
                            console.log("Status:", status);
                            console.log("Error:", error);
                            console.log("Response Text:", xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>

    <?php include "footer.php" ?>
</body>

</html>