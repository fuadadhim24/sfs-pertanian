<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('../../../Models/UserModel.php');
    include_once("../../../../config/database.php");

    $email = $_POST['email'];
    $password = $_POST['password'];

    $userModel = new UserModel($conn);
    if (!$userModel->emailExists($email)) {
        // Email belum ada
        $response = array(
            'success' => false,
            'message' => 'Email belum terdaftar. Silahkan daftar atau menghubungi cs.'
        );

    } else {
        if ($userModel->authenticateUser($email, $password)) {
            $_SESSION['user_email'] = $email;
            // Pendaftaran berhasil
            $response = array(
                'success' => true,
                'message' => 'Sign In successful!'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Sign In failed. Please try again.'
            );
        }
    }

    // Mengirim respons dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>