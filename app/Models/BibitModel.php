<?php
class BibitModel
{
    private $conn;

    public function __construct($conn)
    {
        if ($conn === null) {
            die("Database connection is not valid.");
        }
        $this->conn = $conn;
    }

    public function getAllBibit() {
        $query = "SELECT * FROM bibit";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            return []; // Kembalikan array kosong jika gagal mempersiapkan pernyataan SQL
        }

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $bibits = [];

            while ($row = $result->fetch_assoc()) {
                $bibits[] = $row;
            }

            $stmt->close(); // Tutup pernyataan setelah penggunaan
            return $bibits;
        } else {
            return []; // Kembalikan array kosong jika gagal mengeksekusi pernyataan SQL
        }
    }

    public function createBibit($nama_bibit, $harga, $jumlah_perkg, $deskripsi_singkat, $kelebihan, $kekurangan, $ketahanan_hama_penyakit, $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3, $jenis_tanah, $musim_tanam, $estimasi_panen, $durasi_penanaman, $durasi_anakan, $durasi_bunting, $durasi_pemasakan) {
        $stmt = $this->conn->prepare("INSERT INTO `bibit` (`id_bibit`, `nama_bibit`, `harga`, `jumlah`,`deskripsi_singkat`, `kelebihan`, `kekurangan`, `ketahanan_hama_penyakit`, `gambar_path_main`, `gambar_path_1`, `gambar_path_2`, `gambar_path_3`, `jenis_tanah`, `musim_tanam`, `estimasi_panen`, `durasi_penanaman`, `durasi_anakan`, `durasi_bunting`, `durasi_pemasakan`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if (!$stmt) {
            return false; // Kembalikan false jika gagal mempersiapkan pernyataan SQL
        }

        $stmt->bind_param("ssssssssssssssssss", $nama_bibit, $harga, $jumlah_perkg, $deskripsi_singkat, $kelebihan, $kekurangan, $ketahanan_hama_penyakit, $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3, $jenis_tanah, $musim_tanam, $estimasi_panen, $durasi_penanaman, $durasi_anakan, $durasi_bunting, $durasi_pemasakan);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
    public function editBibit($id,$nama_bibit, $harga, $jumlah_perkg, $deskripsi_singkat, $kelebihan, $kekurangan, $ketahanan_hama_penyakit, $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3, $jenis_tanah, $musim_tanam, $estimasi_panen, $durasi_penanaman, $durasi_anakan, $durasi_bunting, $durasi_pemasakan) {
        $stmt = $this->conn->prepare("UPDATE `bibit` SET `nama_bibit`=?, `harga`=?, `jumlah`=?,`deskripsi_singkat`=?, `kelebihan`=?, `kekurangan`=?, `ketahanan_hama_penyakit`=?, `gambar_path_main`=?, `gambar_path_1`=?, `gambar_path_2`=?, `gambar_path_3`=?, `jenis_tanah`=?, `musim_tanam`=?, `estimasi_panen`=?, `durasi_penanaman`=?, `durasi_anakan`=?, `durasi_bunting`=?, `durasi_pemasakan`=? WHERE `id_bibit`=?");
    
        if (!$stmt) {
            return false;
        }
    
        $stmt->bind_param("sssssssssssssssssss", $nama_bibit, $harga, $jumlah_perkg, $deskripsi_singkat, $kelebihan, $kekurangan, $ketahanan_hama_penyakit, $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3, $jenis_tanah, $musim_tanam, $estimasi_panen, $durasi_penanaman, $durasi_anakan, $durasi_bunting, $durasi_pemasakan, $id);
        $result = $stmt->execute();
        $stmt->close();
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteBibit($id) {
        // Lakukan penghapusan data berdasarkan ID
        $query = "DELETE FROM `bibit` WHERE `bibit`.`id_bibit` = $id";
        $result=mysqli_query($this->conn, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    
}
?>
