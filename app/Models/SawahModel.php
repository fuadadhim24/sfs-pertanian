<?php
class SawahModel
{
    private $conn;

    public function __construct($conn)
    {
        if ($conn === null) {
            die("Database connection is not valid.");
        }
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

    public function createSawah($nama_sawah, $lokasi_sawah, $luas_sawah, $deskripsi, $created_by, $created_at) {
        $stmt = $this->conn->prepare("INSERT INTO `sawah` (`id_sawah`, `nama_sawah`, `lokasi_sawah`, `luas_sawah`,`deskripsi`, `created_by`, `created_at`) VALUES (NULL, ?, ?, ?, ?, ?, ?)");
        
        if (!$stmt) {
            return false; // Kembalikan false jika gagal mempersiapkan pernyataan SQL
        }

        $stmt->bind_param("ssssss", $nama_sawah, $lokasi_sawah, $luas_sawah, $deskripsi, $created_by, $created_at);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
    public function editSawah($id, $nama_sawah, $lokasi_sawah, $deskripsi, $created_by, $created_at) {
        $stmt = $this->conn->prepare("UPDATE `sawah` SET `nama_sawah`=?, `lokasi_sawah`=?, `deskripsi`=?, `created_by`=?, `created_at`=? WHERE `id_sawah`=?");
    
        if (!$stmt) {
            return false;
        }
    
        $stmt->bind_param("ssssss", $nama_sawah, $lokasi_sawah, $deskripsi, $created_by, $created_at, $id);
        $result = $stmt->execute();
        $stmt->close();
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteSawah($id) {
        // Lakukan penghapusan data berdasarkan ID
        $query = "DELETE FROM `sawah` WHERE `sawah`.`id_sawah` = $id";
        $result=mysqli_query($this->conn, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    
}
?>
