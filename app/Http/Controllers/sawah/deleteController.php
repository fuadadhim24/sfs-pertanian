<?php
include_once('../../../Models/SawahModel.php');
include_once('../../../../config/database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sawahModel = new SawahModel($conn);

    if($sawahModel->deleteSawah($id)){
        $response = array(
            'success' => true,
            'message' => 'Sawah Berhasil Dihapus'
        );
    } else {
        // Pendaftaran gagal
        $response = array(
            'success' => false,
            'message' => 'Gagal Menghapus Sawah'
        );
    }

    // Mengirim respons dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>


   

