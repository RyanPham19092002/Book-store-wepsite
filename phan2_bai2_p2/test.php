<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bookshop";
    $category = "Kinh tế";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    $list_cat = "SELECT Category FROM data_bookstore_v3";
    $result_list = mysqli_query($conn, $list_cat);
    $result_list_id = mysqli_fetch_assoc($result_list);
    $categories = array();
    while ($row = mysqli_fetch_assoc($result_list)) {
        $categories[] = $row['Category'];
    }
    $categories = array_unique($categories);
    $id_cat = array_search($category, $categories);
    var_dump($id_cat);
    mysqli_close($conn);
    ?>