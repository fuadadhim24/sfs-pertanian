<?php
header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include_once('../../../Models/UserModel.php');
    include_once("../../../../config/database.php");

    $id = $_POST['id_user'];

    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $alamat = $_POST['alamat'];

    $email = $_POST['email'];
    $no_handphone = $_POST['no_handphone'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];
    $tanggal_daftar = $_POST['tanggal_daftar'];
    $gambar_path_main = $_FILES['gambar_path_main']['name'];      

     //move file ke direktori
    $targetDir = "../../../../public/assets/img/akun/";
    if(!empty($gambar_path_main)){
        move_uploaded_file($_FILES["gambar_path_main"]["tmp_name"], $targetDir . $gambar_path_main);
    }else{
        $gambar_path_main = $user['gambar_path_main'];
    }

    $userModel = new UserModel($conn);

    if ($userModel->editUser($id, $nama_depan, $nama_belakang, $alamat, $email, $no_handphone, $tanggal_lahir, $hak_akses, $password, $tanggal_daftar, $gambar_path_main)) {
        // Edit berhasil
        $response = array(
            'success' => true,
            'message' => 'Edit akun berhasil!'
        );
    } else {
        // Edit gagal
        $response = array(
            'success' => false,
            'message' => 'Akun gagal diupdate. Silakan coba kembali.'
        );
    }

    echo json_encode($response);
    exit(); // Stop script execution
}
?>