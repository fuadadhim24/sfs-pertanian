<?php
header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include_once('../../../Models/SemprotanModel.php');
    include_once("../../../../config/database.php");

    $id = $_POST['id_semprotan'];   

    $query = "SELECT * FROM semprotan WHERE id_semprotan = $id";
    $result = mysqli_query($conn, $query);
    $semprotan = mysqli_fetch_array($result);

    
    $nama_semprotan = $_POST['nama_semprotan'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $kegunaan = $_POST['kegunaan'];

    $detail_semprotan = $_POST['detail_semprotan'];
    $deskripsi_singkat = $_POST['deskripsi_singkat'];
    
    //dapat nama file
    $gambar_path_main = $_FILES['gambar_path_main']['name'];      
    $gambar_path_1 = $_FILES['gambar_path_1']['name'];
    $gambar_path_2 = $_FILES['gambar_path_2']['name'];
    $gambar_path_3 = $_FILES['gambar_path_3']['name'];

    $targetDir = "../../../../public/assets/img/semprotan/";
    if(!empty($gambar_path_main)){
        move_uploaded_file($_FILES["gambar_path_main"]["tmp_name"], $targetDir . $gambar_path_main);
    }else{
        $gambar_path_main = $semprotan['gambar_path_main'];
    }

    if(!empty($gambar_path_1)){
        move_uploaded_file($_FILES["gambar_path_1"]["tmp_name"], $targetDir . $gambar_path_1);
    }else{
        $gambar_path_1 = $semprotan['gambar_path_1'];
    }

    if(!empty($gambar_path_2)){
        move_uploaded_file($_FILES["gambar_path_2"]["tmp_name"], $targetDir . $gambar_path_2);
    }else{
        $gambar_path_2 = $semprotan['gambar_path_2'];
    }

    if(!empty($gambar_path_main)){
        move_uploaded_file($_FILES["gambar_path_3"]["tmp_name"], $targetDir . $gambar_path_3);
    }else{
        $gambar_path_main = $semprotan['gambar_path_3'];
    }


    $semprotanModel = new SemprotanModel($conn);

    if ($semprotanModel->editSemprotan($id, $nama_semprotan, $harga, $jumlah, $kegunaan, $detail_semprotan, $deskripsi_singkat , $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3)) {
        // Edit berhasil
        $response = array(
            'success' => true,
            'message' => 'Edit semprotan berhasil!'
        );
    } else {
        // Edit gagal
        $response = array(
            'success' => false,
            'message' => 'Semprotan gagal diupdate. Silakan coba kembali.'
        );
    }

    echo json_encode($response);
    exit(); // Stop script execution
}
?>