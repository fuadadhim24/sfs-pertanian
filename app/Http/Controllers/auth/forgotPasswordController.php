<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../../../vendor/autoload.php'; // Include the PHPMailer autoloader
// Database connection
include_once("../../../../config/database.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to generate a unique token
function generateToken() {
    // Generate random 6-digit number
    $token = rand(100000, 999999);

    // Convert to string
    return (string) $token;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $token = generateToken();

        // Store the token in the database
        $stmt = $conn->prepare("UPDATE users SET reset_token = ? WHERE email = ?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();
        $stmt->close();

        // Store the email and token in the session
        $_SESSION['reset_email'] = $email;

        $to = $email;

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Your SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'jejakpadi@gmail.com'; // Your SMTP username
            $mail->Password   = 'syltzsyuucvnmktu'; // Your SMTP password
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('jejakpadi@gmail.com', 'Jejak Padi');
            $mail->addAddress($to); // Add a recipient

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset';
            $mail->Body    = "$token adalah token reset password anda: ";

            $mail->send();
            $response = array(
                'success' => true,
                'message' => "Kode verifikasi telah terkirim ke $email"
            );
        } catch (Exception $e) {
            $response = array(
                'success' => false,
                'message' => "Mailer Error: " . $mail->ErrorInfo
            );
        }
    } else {
        // Send JSON response for email not found
        $response = array(
            'success' => false,
            'message' => "Email anda tidak terdaftar."
        );
    }
    $conn->close();
    // Mengirim respons dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
