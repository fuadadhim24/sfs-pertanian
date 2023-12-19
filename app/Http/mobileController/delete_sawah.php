<?php
include_once("koneksi.php");

// Pastikan bahwa id_sawah disediakan melalui parameter GET
if(isset($_GET['id_sawah'])){
    $id_sawah = $_GET['id_sawah'];

    // Query untuk menghapus data sawah berdasarkan ID
    $query = "DELETE FROM `sawah` WHERE `id_sawah` = $id_sawah;";

    $result = mysqli_query($conn, $query);

    // Cek apakah query berhasil dieksekusi
    if($result){
        echo json_encode(array('success' => true, 'message' => 'Record deleted successfully'));
    } else {
        // Jika query gagal dieksekusi
        echo json_encode(array('success' => false, 'message' => 'Error deleting record: ' . mysqli_error($conn)));
    }
} else {
    // Jika id_sawah tidak disediakan
    echo json_encode(array('success' => false, 'message' => 'ID sawah not provided'));
}

// Pastikan untuk menutup koneksi database setelah penggunaan
mysqli_close($conn);
?>