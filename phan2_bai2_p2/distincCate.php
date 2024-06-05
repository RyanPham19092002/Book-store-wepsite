<?php
include ("./connectDB.php");
$sql = "SELECT DISTINCT Category FROM data_bookstore_v3";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        $Category = $row['Category'];
        echo '<li><a href="./index.php?Category=' .$Category . '&page=1">';
        echo $row['Category'];
        echo '</a></li>';

    }
    echo '</ul>';
}

mysqli_close($conn);
