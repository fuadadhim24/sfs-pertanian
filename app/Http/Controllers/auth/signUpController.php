<?php
include_once('../../../Models/UserModel.php');
include_once("../../../../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userModel = new UserModel($conn);
    if (strlen($password) < 8) {
        $response = array(
            'success' => false,
            'message' => 'Email belum terdaftar. Silakan Mendaftar.'
        );
    } else {
        if (!$userModel->emailExists($email)) {
            if ($userModel->createUser($username, $email, $password)) {
                // Pendaftaran berhasil
                $response = array(
                    'success' => true,
                    'message' => 'Registration successful!'
                );
            } else {
                // Pendaftaran gagal
                $response = array(
                    'success' => false,
                    'message' => 'Registration failed. Please try again.'
                );
            }
        } else {
            // Email sudah ada
            $response = array(
                'success' => false,
                'message' => 'Email already exists. Please use a different email address.'
            );
        }
    }
    // Mengirim respons dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>