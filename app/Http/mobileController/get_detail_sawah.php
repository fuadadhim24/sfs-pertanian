<?php

include_once("../../../config/database.php");

// Dapatkan id_sawah dari parameter GET
$idSawah = $_GET['id_sawah'];

$query = "SELECT id_detail_sawah, id_sawah, id_bibit, tanggal_tanam, jumlah_benih 
          FROM `detail_sawah` 
          WHERE id_sawah = $idSawah";

$result = mysqli_query($conn, $query);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($conn);

?>
