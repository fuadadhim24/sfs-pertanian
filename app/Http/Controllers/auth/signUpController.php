<?php
include_once('../../../Models/UserModel.php');
include_once("../../../../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userModel = new UserModel($conn);

    if (!$userModel->emailExists($email)) {
        if ($userModel->createUser($username, $email, $password)) {
            echo "Registration successful!";
            // Redirect to login page or perform other actions
        } else {
            echo "Registration failed. Please try again.";
        }
    } else {
        echo "Email already exists. Please use a different email address.";
    }
}
?>