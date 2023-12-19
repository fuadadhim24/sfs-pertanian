<?php
// get_detailed_data_semprotan.php

include_once("../../../config/database.php");

// Check if 'nama_semprotan' parameter is set
if (!isset($_GET['nama_semprotan'])) {
    echo json_encode(array("error" => "Parameter 'nama_semprotan' is missing"));
    exit;
}

$namaSemprotan = $_GET['nama_semprotan'];

// Use prepared statements to prevent SQL injection
$query = "SELECT nama_semprotan, harga, jumlah, kegunaan, detail_semprotan, gambar_path_main FROM `semprotan` WHERE nama_semprotan = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 's', $namaSemprotan);
mysqli_stmt_execute($stmt);

// Check for errors in the query
if (!$stmt) {
    echo json_encode(array("error" => "Query execution failed"));
    exit;
}

// Get result set
$result = mysqli_stmt_get_result($stmt);

// Check if any rows are returned
if (mysqli_num_rows($result) === 0) {
    echo json_encode(array("error" => "No data found for the given 'nama_semprotan'"));
    exit;
}

// Fetch the data into an array
$response = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Add a key "data" to the response
echo json_encode(array("data" => $response));

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
