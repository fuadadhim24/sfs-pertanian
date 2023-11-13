<?php
// database.php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$database = "sfs-pertanian";

$conn = new mysqli($host, $dbUsername, $dbPassword, $database);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>
