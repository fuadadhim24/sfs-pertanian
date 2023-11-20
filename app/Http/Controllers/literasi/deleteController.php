<?php
include_once('../../../Models/LiterasiModel.php');
include_once('../../../../config/database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $literasiModel = new LiterasiModel($conn);

    if($literasiModel->deleteLiterasi($id)){
        $response = array(
            'success' => true,
            'message' => 'Literasi Berhasil Dihapus'
        );
    } else {
        // Pendaftaran gagal
        $response = array(
            'success' => false,
            'message' => 'Gagal Menghapus Literasi'
        );
    }

    // Mengirim respons dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>


   

