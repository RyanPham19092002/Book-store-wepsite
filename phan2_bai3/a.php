<?php 

    // Gán giá trị mặc định cho id
$categorical_page = $_GET['Category'];




$servername = "localhost";
$username = "root";
$password = "";
$database = "bookshop";
$conn = mysqli_connect($servername, $username, $password,$database);
// if (!$conn) {
//     die("Connection failed: ". mysqli_connect_error());
// }
// echo "Connected successfully";
// $q = "SELECT * FROM data_bookstore_v3";
// $result = mysqli_query($conn, $q);


$categorical_page_q = "SELECT * FROM data_bookstore_v3 WHERE Category = '$categorical_page'" ;
$result  = mysqli_query($conn, $categorical_page_q);
// $categorical_page_row = mysqli_fetch_assoc($categorical_page_result);
// $categorical_page = $categorical_page_row['Category'];



mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link text = "text/css", rel="stylesheet" href="css/style_a.css">
    <title>phan2_bai3</title>
</head>
<body>
    <div class = "container-xl">
         <p>
            <a href="home_admin.php">Home</a> &gt; <a href="a.php?Category=<?php echo $categorical_page ;?>"><?php echo $categorical_page ;?></a>
        </p>
        <h1> Thể loại : <?php echo $categorical_page ;?></h1>
        <br>
        <!-- <h1>Read products</h1>
        <br> -->
        <button type="button" class="btn btn-success" onclick = "window.location.href='b.php?Category=<?php echo $categorical_page ;?>'">Create New Product</button>
        <br>
        <br>
        <table>
            <?php 
            echo "<tr><th>ID</th>
            <th class = 'name-column'>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Dis</th>
            <th class ='image-column'>Image</th>
            <th class ='image-column'>Image1</th>
            <th class ='image-column'>Image2</th>
            <th class ='image-column'>Image3</th>
            <th class ='image-column'>Image4</th>
            <th class='action-column'>Action</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>{$row['ID']}</td>";
                echo "<td>{$row['Name']}</td>";
                echo "<td>{$row['Description']}</td>";
                echo "<td>{$row['Raw_price']}<sup>đ</sup></td>";
                echo "<td>".(100*$row['Discount'])."%</td>";
                if ($row['Link_img_raw'] != ""){
                    echo "<td><img class ='image-inbox'  src='../phan2_bai2/{$row['Link_img_raw']}' alt='img'</td>";
                }
                else {
                    echo "<td><img class ='image-inbox' alt=''</td>";
                }
                if ($row['Link_img_1'] != ""){
                    echo "<td><img class ='image-inbox'  src='../phan2_bai2/{$row['Link_img_1']}' alt='img'</td>";
                }
                else {
                    echo "<td><img class ='image-inbox' alt=''</td>";
                }
                if ($row['Link_img_2'] != ""){
                    echo "<td><img class ='image-inbox'  src='../phan2_bai2/{$row['Link_img_2']}' alt='img'</td>";
                }
                else {
                    echo "<td><img class ='image-inbox' alt=''</td>";
                }
                if ($row['Link_img_3'] != ""){
                    echo "<td><img class ='image-inbox' src='../phan2_bai2/{$row['Link_img_3']}' alt='img'</td>";
                }
                else {
                    echo "<td><img class ='image-inbox'' alt=''</td>";
                }
                if ($row['Link_img_4'] != ""){
                    echo "<td><img class ='image-inbox' src='../phan2_bai2/{$row['Link_img_4']}' alt='img'</td> ";
                } 
                else {
                    echo "<td><img class ='image-inbox' alt=''</td>";
                }
                echo "<td><button type='button' class='btn btn-primary' onclick=\"window.location.href='c.php?Category=".$row['Category']."&id=" . $row['ID'] . "'\">Edit</button> &nbsp";
                echo "<button type='button' class='btn btn-danger' onclick=\"window.location.href='d.php?Category=".$row['Category']."&id=" . $row['ID'] . "'\">Delete</button></td></tr>";
            }
            
            ?>
            
        </table>
    </div>
</body>
</html>
