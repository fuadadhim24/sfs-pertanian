<?php
class SawahModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllSawah() {
        $query = "SELECT * FROM sawah";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            return []; // Kembalikan array kosong jika gagal mempersiapkan pernyataan SQL
        }

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $sawahs = [];

            while ($row = $result->fetch_assoc()) {
                $sawahs[] = $row;
            }

            $stmt->close(); // Tutup pernyataan setelah penggunaan
            return $sawahs;
        } else {
            return []; // Kembalikan array kosong jika gagal mengeksekusi pernyataan SQL
        }
    }

    public function createSawah($nama_sawah, $lokasi_sawah, $deskripsi, $created_by, $created_at) {
        $query = "INSERT INTO `sawah` (`nama_sawah`, `lokasi_sawah`, `deskripsi`, `created_by`, `created_at`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            return false; // Kembalikan false jika gagal mempersiapkan pernyataan SQL
        }

        $stmt->bind_param("sssss", $nama_sawah, $lokasi_sawah, $deskripsi, $created_by, $created_at);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
}
?>
