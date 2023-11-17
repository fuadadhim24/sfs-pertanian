<?php
header('Content-Type: application/json'); // Pindahkan header ke atas agar diakses sebelum output
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('../../../Models/SawahModel.php');
    include_once("../../../../config/database.php");

    $id = $_POST['id_sawah'];
    $lokasi_sawah = $_POST['lokasi_sawah'];
    $nama_sawah = $_POST['nama_sawah'];
    $deskripsi = $_POST['deskripsi'];
    $created_at = $_POST['created_at'];
    $created_by = "Admin";

    $sawahModel = new SawahModel($conn);

    if ($sawahModel->editSawah($id, $nama_sawah, $lokasi_sawah, $deskripsi, $created_by, $created_at)) {
        // Edit berhasil
        $response = array(
            'success' => true,
            'message' => 'Edit sawah berhasil!'
        );
    } else {
        // Edit gagal
        $response = array(
            'success' => false,
            'message' => 'Sawah gagal diupdate. Silakan coba kembali.'
        );
    }

    echo json_encode($response);
    exit(); // Stop script execution
}
?>