<?php
include ("database.php");
$sql = "SELECT DISTINCT ID, Discount, Price, Link_img_raw, Name FROM data_bookstore_v3 ORDER BY `data_bookstore_v3`.`Discount` DESC LIMIT 10";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['Name'];
        $price = $row['Price'];
        $discount = $row['Discount'];
        $image = $row['Link_img_raw'];
        $id = $row['ID'];
        $truncatedTitle = (strlen($name) > 10) ? substr($name, 0, 50) . '...' : $name;

        echo '<div class="row">';
        echo '<div class="col-6">';
        echo '<a href="#"><div class="row position-relative">';
        echo '<span style="font-size: 0.6em; width: 30%;" class="position-absolute top-0 start-50  badge border border-light bg-danger p-2" style="width=50px; height=50px">' . $discount * 100 . '%</span>';
        //echo '<span class="position-absolute top-0 start-0 translate-middle badge border border-light rounded-circle bg-danger p-2" style="width=50px; height=50px">' . $discount * 100 . '%</span>';
        echo '<img src="' . $image . '">';
        echo '</div></a>';
        echo '</div>';
        echo '<div class="col-6">';
        echo $truncatedTitle;
        echo '<br /><div style="color: red;">' . $price . 'đ</div>';
        echo '</div>';
        echo '</div>';
    }
}

mysqli_close($conn);
?>