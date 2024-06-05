<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "bookshop";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// if (!$conn) {
//     die("Connection failed: ". mysqli_connect_error());
// }
// echo "Connected successfully";
$ID = $_GET['id'];
$q = "SELECT * FROM products WHERE id = '$ID'";
$result = mysqli_query($conn, $q);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    //$data[] = $row;
    array_push($data,$row);
}

echo json_encode($data);


mysqli_close($conn);
?>