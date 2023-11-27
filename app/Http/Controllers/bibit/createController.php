<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('../../../Models/BibitModel.php');
    include_once("../../../../config/database.php");
    $nama_bibit = $_POST['nama_bibit'];
    $harga = $_POST['harga'];
    $jumlah_perkg = $_POST['jumlah_perkg'];

    $deskripsi_singkat = $_POST['deskripsi_singkat'];
    $kelebihan = $_POST['kelebihan'];
    $kekurangan = $_POST['kekurangan'];
    $ketahanan_hama_penyakit = $_POST['ketahanan_hama_penyakit'];
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
    $musim_tanam = $_POST['musim_tanam'];
    $estimasi_panen = $_POST['estimasi_panen'];

    $durasi_penanaman = $_POST['durasi_penanaman'];
    $durasi_anakan = $_POST['durasi_anakan'];
    $durasi_bunting = $_POST['durasi_bunting'];
    $durasi_pemasakan = $_POST['durasi_pemasakan'];

    $bibitModel = new BibitModel($conn);

        if ($bibitModel->createBibit($nama_bibit, $harga, $jumlah_perkg, $deskripsi_singkat, $kelebihan, $kekurangan, $ketahanan_hama_penyakit, $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3, $jenis_tanah, $musim_tanam, $estimasi_panen, $durasi_penanaman, $durasi_anakan, $durasi_bunting, $durasi_pemasakan)) {
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