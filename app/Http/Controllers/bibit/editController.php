<?php
header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include_once('../../../Models/BibitModel.php');
    include_once("../../../../config/database.php");

    $id = $_POST['id_bibit'];

    $query = "SELECT * FROM bibit WHERE id_bibit = $id";
    $result = mysqli_query($conn, $query);
    $bibit = mysqli_fetch_array($result);

    
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

    $targetDir = "../../../../public/assets/img/bibit/";
    if(!empty($gambar_path_main)){
        move_uploaded_file($_FILES["gambar_path_main"]["tmp_name"], $targetDir . $gambar_path_main);
    }else{
        $gambar_path_main = $bibit['gambar_path_main'];
    }

    if(!empty($gambar_path_1)){
        move_uploaded_file($_FILES["gambar_path_1"]["tmp_name"], $targetDir . $gambar_path_1);
    }else{
        $gambar_path_1 = $bibit['gambar_path_1'];
    }

    if(!empty($gambar_path_2)){
        move_uploaded_file($_FILES["gambar_path_2"]["tmp_name"], $targetDir . $gambar_path_2);
    }else{
        $gambar_path_2 = $bibit['gambar_path_2'];
    }

    if(!empty($gambar_path_main)){
        move_uploaded_file($_FILES["gambar_path_3"]["tmp_name"], $targetDir . $gambar_path_3);
    }else{
        $gambar_path_main = $bibit['gambar_path_3'];
    }


    $jenis_tanah = $_POST['jenis_tanah'];
    $cuaca = $_POST['cuaca'];
    $estimasi_panen = $_POST['estimasi_panen'];

    $bibitModel = new BibitModel($conn);

    if ($bibitModel->editBibit($id, $nama_bibit, $harga, $jumlah_perkg, $deskripsi_singkat, $deskripsi_lengkap, $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3, $jenis_tanah, $cuaca, $estimasi_panen)) {
        // Edit berhasil
        $response = array(
            'success' => true,
            'message' => 'Edit bibit berhasil!'
        );
    } else {
        // Edit gagal
        $response = array(
            'success' => false,
            'message' => 'Bibit gagal diupdate. Silakan coba kembali.'
        );
    }

    echo json_encode($response);
    exit(); // Stop script execution
}
?>