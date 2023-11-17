<?php
include_once('../../../Models/BibitModel.php');
include_once('../../../../config/database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $bibitModel = new BibitModel($conn);

    if($bibitModel->deleteBibit($id)){
        $response = array(
            'success' => true,
            'message' => 'Bibit Berhasil Dihapus'
        );
    } else {
        // Pendaftaran gagal
        $response = array(
            'success' => false,
            'message' => 'Gagal Menghapus Bibit'
        );
    }

    // Mengirim respons dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>


   

