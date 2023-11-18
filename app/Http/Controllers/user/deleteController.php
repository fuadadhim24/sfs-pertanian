<?php
include_once('../../../Models/UserModel.php');
include_once('../../../../config/database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $userModel = new UserModel($conn);

    if($userModel->deleteUser($id)){
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


   

