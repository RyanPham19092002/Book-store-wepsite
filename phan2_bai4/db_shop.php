<?php

// if (!isset($_GET['id'])) {
//     // Gán giá trị mặc định cho id
//     $_GET['id'] = 1;
// }

// Trích xuất giá trị id
//$id_page = $_GET['id'];
$servername = "localhost";
$username = "root";
$password = "";
$database = "bookshop";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}
echo "Connected successfully";
//Check connection
$q = "SELECT * FROM data_bookstore_v1";
$result = mysqli_query($conn, $q);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    //$data[] = $row;
    array_push($data,$row);
}

echo json_encode($data);
mysqli_close($conn);
?>