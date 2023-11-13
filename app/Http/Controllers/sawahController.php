<?php
require_once "../../models/SawahModel.php";
require_once "../../../config/database.php";

class SawahController {
    private $model;
    private $conn; // Tambahkan property untuk koneksi

    public function __construct($conn) {
        $this->model = new SawahModel($conn);
        $this->conn = $conn; // Inisialisasi koneksi
    }

    public function index() {
        $sawahs = $this->model->getAllSawah();
        include "../../../resources/views/admin/sawah/index.php";
    }

    public function create() {
        $response = []; // Inisialisasi variabel respons

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama_sawah = $_POST['nama_sawah'];
            $lokasi_sawah = $_POST['lokasi_sawah'];
            $deskripsi = $_POST['deskripsi'];
            $created_by = "Admin"; // Anda bisa memasukkan nama pengguna admin yang sesuai di sini
            $created_at = date("Y-m-d H:i:s"); // Tanggal dan waktu saat ini

            if ($this->model->createSawah($nama_sawah, $lokasi_sawah, $deskripsi, $created_by, $created_at)) {
                $response = array(
                    'success' => true,
                    'message' => 'Pendaftaran berhasil!'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Pendaftaran gagal. Silakan coba lagi.'
                );
            }
        } else {
            $response = array(
                'success' => false,
                'message' => 'Metode permintaan tidak valid.'
            );
        }

        // Mengirim respons dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
?>
