<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('../../../Models/UserModel.php');
    include_once("../../../../config/database.php");
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $alamat = $_POST['alamat'];

    $email = $_POST['email'];
    $no_handphone = $_POST['no_handphone'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];
    $gambar_path_main = $_FILES['gambar_path_main']['name'];      
    //move file ke direktori
    $targetDir = "../../../../public/assets/img/akun/";
    move_uploaded_file($_FILES["gambar_path_main"]["tmp_name"], $targetDir . $gambar_path_main);

    $userModel = new UserModel($conn);

        if ($userModel->createUser($nama_depan, $nama_belakang, $alamat, $email, $no_handphone, $tanggal_lahir, $hak_akses, $password, $gambar_path_main)) {
            // Pendaftaran berhasil
            $response = array(
                'success' => true,
                'message' => 'Akun berhasil ditambahkan!'
            );
        } else {
            // Pendaftaran gagal
            $response = array(
                'success' => false,
                'message' => 'Gagal menambahkan akun. Silakan mencoba ulang.'
            );
        }
    
    // Mengirim respons dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>