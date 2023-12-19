<?php
// Include the database connection file
include_once("../../../config/database.php");

$id_user = $_GET['id_user'];
// SQL query
$sql = "SELECT id_sawah, nama_sawah, lokasi_sawah, luas_sawah, deskripsi, id_user, created_at FROM `sawah` WHERE `id_user`=$id_user";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Fetch the data as an associative array
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // Return an error message
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
