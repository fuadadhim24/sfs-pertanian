<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('../../../Models/BibitModel.php');
    include_once("../../../../config/database.php");
    $nama_bibit = $_POST['nama_bibit'];
    $harga = $_POST['harga'];
    $jumlah_perkg = $_POST['jumlah_perkg'];

    $deskripsi_singkat = $_POST['deskripsi_singkat'];
    $deskripsi_lengkap = $_POST['deskripsi_lengkap'];
    //dapat nama file
    $gambar_path_main = $_FILES['gambar_path_main']['name'];        
    $gambar_path_1 = $_FILES['gambar_path_1']['name'];
    $gambar_path_2 = $_FILES['gambar_path_2']['name'];
    $gambar_path_3 = $_FILES['gambar_path_3']['name'];
    //move file ke direktori
    $targetDir = "../../../../public/assets/img/bibit/";
    move_uploaded_file($_FILES["gambar_path_main"]["tmp_name"], $targetDir . $gambar_path_main);
    move_uploaded_file($_FILES["gambar_path_1"]["tmp_name"], $targetDir . $gambar_path_1);
    move_uploaded_file($_FILES["gambar_path_2"]["tmp_name"], $targetDir . $gambar_path_2);
    move_uploaded_file($_FILES["gambar_path_3"]["tmp_name"], $targetDir . $gambar_path_3);

    $jenis_tanah = $_POST['jenis_tanah'];
    $cuaca = $_POST['cuaca'];
    $estimasi_panen = $_POST['estimasi_panen'];

    $bibitModel = new BibitModel($conn);

        if ($bibitModel->createBibit($nama_bibit, $harga, $jumlah_perkg, $deskripsi_singkat, $deskripsi_lengkap, $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3, $jenis_tanah, $cuaca, $estimasi_panen)) {
            // Pendaftaran berhasil
            $response = array(
                'success' => true,
                'message' => 'Bibit berhasil ditambahkan!'
            );
        } else {
            // Pendaftaran gagal
            $response = array(
                'success' => false,
                'message' => 'Gagal menambahkan bibit. Silakan mencoba ulang.'
            );
        }
    
    // Mengirim respons dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>