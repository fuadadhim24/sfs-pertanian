<?php
include_once("../../../config/database.php");

// Pastikan bahwa id_user disediakan melalui parameter GET
if(isset($_GET['id_user'])){
    $id_user = $_GET['id_user'];

    // Query untuk mengambil data user berdasarkan ID
    $query = "SELECT * FROM users WHERE users.id_user = $id_user;";

    $result = mysqli_query($conn, $query);

    // Cek apakah query berhasil dieksekusi
    if($result){
        $user = mysqli_fetch_array($result);
        echo json_encode($user);
    } else {
        // Jika query gagal dieksekusi
        echo json_encode(array('error' => 'Query error'));
    }
} else {
    // Jika id_user tidak disediakan
    echo json_encode(array('error' => 'ID user not provided'));
}
?>
