<?php
include_once('../../../Models/SemprotanModel.php');
include_once('../../../../config/database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $semprotanModel = new SemprotanModel($conn);

    if($semprotanModel->deleteSemprotan($id)){
        $response = array(
            'success' => true,
            'message' => 'Semprotan Berhasil Dihapus'
        );
    } else {
        // Pendaftaran gagal
        $response = array(
            'success' => false,
            'message' => 'Gagal Menghapus Semprotan'
        );
    }

    // Mengirim respons dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>


   

