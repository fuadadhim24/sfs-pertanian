<?php
// Include your database connection file
include_once("../../../config/database.php");

// SQL query to fetch data from the 'pupuk' table
$sql = "SELECT id_pupuk, nama_pupuk FROM pupuk";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result->num_rows > 0) {
    // Initialize an array to store the data
    $pupukData = array();

    // Fetch each row and add it to the array
    while ($row = $result->fetch_assoc()) {
        $pupukData[] = $row;
    }

    // Send the data as JSON response
    echo json_encode($pupukData);
} else {
    // If no data is found, send an empty JSON array
    echo json_encode(array());
}

// Close the database connection
$conn->close();
?>
