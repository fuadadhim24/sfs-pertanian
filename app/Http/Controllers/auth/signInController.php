    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include_once('../../../Models/UserModel.php');
        include_once("../../../../config/database.php");

        $email = $_POST['email'];
        $password = $_POST['password'];
        if (strlen($password) < 8) {
            $response = array(
                'success' => false,
                'message' => 'Password harus minimal 8 karakter.'
            );}
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
                    'message' => 'Akun berhasil teridentifikasi admin'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Email atau password anda salah!'
                );
            }
        }

        // Mengirim respons dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    ?>