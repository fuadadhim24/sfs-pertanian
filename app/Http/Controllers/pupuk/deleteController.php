<?php
include_once('../../../Models/PupukModel.php');
include_once('../../../../config/database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $pupukModel = new PupukModel($conn);

    if($pupukModel->deletePupuk($id)){
        $response = array(
            'success' => true,
            'message' => 'Pupuk Berhasil Dihapus'
        );
    } else {
        // Pendaftaran gagal
        $response = array(
            'success' => false,
            'message' => 'Gagal Menghapus Pupuk'
        );
    }

    // Mengirim respons dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>


   

