<?php
// Menggunakan koneksi.php
require_once('koneksi.php');

// Mendapatkan data dari request POST
$id_user = $_POST['id_user'];
$nama_depan = $_POST['nama_depan'];
$nama_belakang = $_POST['nama_belakang'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$no_handphone = $_POST['no_handphone'];
// $tanggal_lahir = $_POST['tanggal_lahir'];
// $gambar_path = $_POST['gambar_path'];

// Query update
$query = "UPDATE `users` SET `nama_depan` = '$nama_depan', `nama_belakang` = '$nama_belakang', `alamat` = '$alamat', `email` = '$email', `no_handphone` = '$no_handphone' WHERE `users`.`id_user` = $id_user;";
          

// Menjalankan query
if ($conn->query($query) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'Data pengguna berhasil diupdate.';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Error updating record: ' . $conn->error;
}

// Menutup koneksi
$conn->close();

// Mengembalikan response dalam format JSON
echo json_encode($response);
?>
