<?php

// Include your database connection file
include 'koneksi.php';

// SQL query to fetch data from the 'semprotan' table
$sql = "SELECT id_semprotan, nama_semprotan FROM semprotan";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result->num_rows > 0) {
    // Initialize an array to store the data
    $semprotanData = array();

    // Fetch each row and add it to the array
    while ($row = $result->fetch_assoc()) {
        $semprotanData[] = $row;
    }

    // Send the data as JSON response
    echo json_encode(array('status' => 'success', 'data' => $semprotanData));
} else {
    // If no data is found, send an empty JSON array
    echo json_encode(array('status' => 'error', 'message' => 'No data found for semprotan.'));
}

// Close the database connection
$conn->close();
?>
