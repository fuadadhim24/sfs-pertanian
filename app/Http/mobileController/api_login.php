<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Gunakan prepared statement untuk mencegah SQL injection
    $stmt = $conn->prepare("SELECT id_user FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id_user);
        $stmt->fetch();

        // Kirim respons JSON dengan data pengguna
        $response['status'] = 'success';
        $response['message'] = 'Selamat Datang';
        $response['id_user'] = $id_user;
        echo json_encode($response);
    } else {
        // Kirim respons JSON jika login gagal
        $response['status'] = 'error';
        $response['message'] = 'Email atau Kata Sandi Anda tidak sesuai';
        echo json_encode($response);
    }

    $stmt->close();
    $conn->close();
}
?>
