<?php
include ("./connectDB.php");
$numDisplay = $_POST["numProductNew"];
$sql = "SELECT DISTINCT Name, Price, Raw_price, Link_img_raw, ID  FROM data_bookstore_v3 ORDER BY ID DESC LIMIT $numDisplay";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['Name'];
        $price = $row['Price'];
        $rawPrice = $row['Raw_price'];

        $image = $row['Link_img_raw'];
        $id = $row['ID'];
        $truncatedTitle = (strlen($name) > 80) ? substr($name, 0, 50) . '...' : $name;

        echo '<div class="col">';
        echo '<div class="card" style="height: 400px;">';
        echo '<div style="height: 60%; text-align: center;">';
        echo '<img  src="' . $image . '" class="card-img-top" alt="' . $name . '" style="height: 100%; object-fit: contain;">';
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