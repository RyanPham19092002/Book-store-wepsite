<?php
include ("./connectDB.php");
ini_set('display_errors', 1);
error_reporting(E_ALL);
$perPage = 12;
if (isset($_POST["page"])) {
    $page = $_POST["page"];
} else {
    $page = 1;
}


$search = $_POST["searchQuery"];


$startFrom = ($page - 1) * $perPage;
$sql = "SELECT * FROM data_bookstore_v3 WHERE Name like '%$search%' LIMIT $startFrom, $perPage";
$result = mysqli_query($conn, $sql);
$paginationHtml = "<script>console.log(' . $page . ')</script>";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['Name'];
        $price = $row['Price'];
        $rawPrice = $row['Raw_price'];
        $image = $row['Link_img_raw'];
        $id = $row['ID'];
        $category = $row['Category'];
        $truncatedTitle = (strlen($name) > 80) ? substr($name, 0, 50) . '...' : $name;
        // $paginationHtml .= '<script>console.log(' . $name . ')</script>';
        $paginationHtml .= "<script>console.log(' . $page . ')</script>";
        $paginationHtml .= '<div class="col">';

        $paginationHtml .= '<div class="card" style="height: 400px;">';
        $paginationHtml .= '<div style="height: 60%; text-align: center;">';
        $paginationHtml .= '<a href="./detail_index.php?Category=' . $category .'&id=' .$id.'"><img  src="' . $image . '" class="card-img-top" alt="' . $name . '" style="height: 100%; object-fit: contain;"></a>';
        $paginationHtml .= '</div>';

        $paginationHtml .= '<div class="card-body">';
        $paginationHtml .= '<p class="card-title">' . $truncatedTitle . '</p>';
        $paginationHtml .= '<div style="color: red;">' . $price . ' đ</div>';
        $paginationHtml .= '<div style="color: grey; text-decoration: line-through;">' . $rawPrice . ' đ</div>';

        $paginationHtml .= '</div>';
        $paginationHtml .= '</div>';
        $paginationHtml .= '</div>';
    }
} else {
    $paginationHtml .= "{no data}";
}
$jsonData = array(
    "html" => $paginationHtml,
);
echo json_encode($jsonData);
mysqli_close($conn);
?>