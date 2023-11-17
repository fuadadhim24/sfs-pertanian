<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('../../../Models/SawahModel.php');
    include_once("../../../../config/database.php");
    $lokasi_sawah = $_POST['lokasi_sawah'];
    $luas_sawah = $_POST['luas_sawah'];
    $nama_sawah = $_POST['nama_sawah'];
    $deskripsi = $_POST['deskripsi'];
    $created_at = $_POST['created_at'];
    $created_by = "Admin";

    $sawahModel = new SawahModel($conn);
        if (!empty($lokasi_sawah)) {

        if ($sawahModel->createSawah($nama_sawah, $lokasi_sawah, $luas_sawah, $deskripsi, $created_by, $created_at)) {
            // Pendaftaran berhasil
            $response = array(
                'success' => true,
                'message' => 'Sawah berhasil ditambahkan!'
            );
        } else {
            // Pendaftaran gagal
            $response = array(
                'success' => false,
                'message' => 'Gagal menambahkan sawah. Silakan mencoba ulang.'
            );
        }
        }else{
            $response = array(
                'sucess' => false,
                'message' => 'Silakan Tekan Map Untuk Menentukan Lokasi Sawah.'
            );
        }
    
    // Mengirim respons dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>