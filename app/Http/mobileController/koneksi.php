<?php
// database.php
$host = "localhost";
$dbUsername = "id21604959_fuadadhim24";
$dbPassword = "Zenfonix54!";
$database = "id21604959_sfspertanian";

$conn = mysqli_connect($host, $dbUsername, $dbPassword, $database);

if (!$conn){
    echo "koneksi gagal";
} 
?>