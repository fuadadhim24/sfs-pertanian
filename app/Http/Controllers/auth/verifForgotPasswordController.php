<?php
session_start();
include_once("../../../../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];
    $email = $_POST["email2"];

    $_SESSION['reset_token']= $token;
    $_SESSION['reset_email']= $email;

    // Check if the email and token match in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND reset_token = ?");
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        // Token matched, allow password reset
        $response = array(
            'success' => true,
            'message' => "Kode terverifikasi. Silakan memperbarui password."
        );
    } else {
        // Send JSON response for token mismatch
        $response = array(
            'success' => false,
            'message' => "Token anda salah."
        );
    }

    // Mengirim respons dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
