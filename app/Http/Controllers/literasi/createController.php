<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('../../../Models/LiterasiModel.php');
    include_once("../../../../config/database.php");

    $bentuk_kategori = $_POST['bentuk_kategori'];
    $jenis = $_POST['jenis'];
    $judul = $_POST['judul'];

    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];

    //dapat nama file
    $gambar_path_main = $_FILES['gambar_path_main']['name'];        
    $gambar_path_1 = $_FILES['gambar_path_1']['name'];
    $gambar_path_2 = $_FILES['gambar_path_2']['name'];
    $gambar_path_3 = $_FILES['gambar_path_3']['name'];
    //move file ke direktori
    $targetDir = "../../../../public/assets/img/literasi/";
    move_uploaded_file($_FILES["gambar_path_main"]["tmp_name"], $targetDir . $gambar_path_main);
    move_uploaded_file($_FILES["gambar_path_1"]["tmp_name"], $targetDir . $gambar_path_1);
    move_uploaded_file($_FILES["gambar_path_2"]["tmp_name"], $targetDir . $gambar_path_2);
    move_uploaded_file($_FILES["gambar_path_3"]["tmp_name"], $targetDir . $gambar_path_3);

    $literasiModel = new LiterasiModel($conn);

        if ($literasiModel->createLiterasi($bentuk_kategori, $jenis, $judul, $tanggal, $deskripsi , $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3)) {
            // Pendaftaran berhasil
            $response = array(
                'success' => true,
                'message' => 'Jenis Literasi berhasil ditambahkan!'
            );
        } else {
            // Pendaftaran gagal
            $response = array(
                'success' => false,
                'message' => 'Gagal menambahkan jenis pupuk. Silakan mencoba ulang.'
            );
        }
    
    // Mengirim respons dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>