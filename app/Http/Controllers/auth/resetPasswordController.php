<?php
// Database connection
include_once("../../../../config/database.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$token = $_POST["token"];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $token = $_POST["token"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Function to verify the token in the database
    function verifyToken($conn, $email, $token) {
        $sql = "SELECT * FROM users WHERE email = ? AND reset_token = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $token);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result->num_rows > 0;
    }

    // Check if the token is valid
    if (verifyToken($conn, $email, $token)) {
        // Update the password and reset the token
        $updateSql = "UPDATE users SET password = ?, reset_token = NULL WHERE email = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("ss", $password, $email);
        $stmt->execute();
        $stmt->close();

        $response = array(
            'success' => true,
            'message' => "Password berhasil diperbarui."
        );
    } else {
        $response = array(
            'success' => false,
            'message' => "Token atau email tidak valid."
        );
    
    }
    // Mengirim respons dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);

    $conn->close();
}

?>
