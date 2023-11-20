<?php
header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include_once('../../../Models/PupukModel.php');
    include_once("../../../../config/database.php");

    $id = $_POST['id_literasi'];   

    $query = "SELECT * FROM literasi WHERE id_literasi = $id";
    $result = mysqli_query($conn, $query);
    $literasi = mysqli_fetch_array($result);

    
    $nama_literasi = $_POST['nama_literasi'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $kegunaan = $_POST['kegunaan'];

    $detail_literasi = $_POST['detail_literasi'];
    $deskripsi_singkat = $_POST['deskripsi_singkat'];
    
    //dapat nama file
    $gambar_path_main = $_FILES['gambar_path_main']['name'];      
    $gambar_path_1 = $_FILES['gambar_path_1']['name'];
    $gambar_path_2 = $_FILES['gambar_path_2']['name'];
    $gambar_path_3 = $_FILES['gambar_path_3']['name'];

    $targetDir = "../../../../public/assets/img/literasi/";
    if(!empty($gambar_path_main)){
        move_uploaded_file($_FILES["gambar_path_main"]["tmp_name"], $targetDir . $gambar_path_main);
    }else{
        $gambar_path_main = $literasi['gambar_path_main'];
    }

    if(!empty($gambar_path_1)){
        move_uploaded_file($_FILES["gambar_path_1"]["tmp_name"], $targetDir . $gambar_path_1);
    }else{
        $gambar_path_1 = $literasi['gambar_path_1'];
    }

    if(!empty($gambar_path_2)){
        move_uploaded_file($_FILES["gambar_path_2"]["tmp_name"], $targetDir . $gambar_path_2);
    }else{
        $gambar_path_2 = $literasi['gambar_path_2'];
    }

    if(!empty($gambar_path_main)){
        move_uploaded_file($_FILES["gambar_path_3"]["tmp_name"], $targetDir . $gambar_path_3);
    }else{
        $gambar_path_main = $literasi['gambar_path_3'];
    }


    $literasiModel = new PupukModel($conn);

    if ($literasiModel->editPupuk($id, $nama_literasi, $harga, $jumlah, $kegunaan, $detail_literasi, $deskripsi_singkat , $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3)) {
        // Edit berhasil
        $response = array(
            'success' => true,
            'message' => 'Edit literasi berhasil!'
        );
    } else {
        // Edit gagal
        $response = array(
            'success' => false,
            'message' => 'Pupuk gagal diupdate. Silakan coba kembali.'
        );
    }

    echo json_encode($response);
    exit(); // Stop script execution
}
?>