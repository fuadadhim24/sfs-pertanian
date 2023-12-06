<?php
include_once("../../../config/database.php");

$query = "SELECT * FROM literasi WHERE jenis = 'panduan_panen';";
$result = mysqli_query($conn, $query);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($conn);
?>
