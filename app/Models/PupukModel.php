<?php
class PupukModel
{
    private $conn;

    public function __construct($conn)
    {
        if ($conn === null) {
            die("Database connection is not valid.");
        }
        $this->conn = $conn;
    }

    public function createPupuk($nama_pupuk, $harga, $jumlah, $kegunaan, $detail_pupuk, $deskripsi_singkat , $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3) {
        $stmt = $this->conn->prepare("INSERT INTO `pupuk` (`id_pupuk`,`nama_pupuk`, `harga`, `jumlah`, `kegunaan`, `detail_pupuk`, `deskripsi_singkat` , `gambar_path_main`, `gambar_path_1`, `gambar_path_2`, `gambar_path_3`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if (!$stmt) {
            return false; // Kembalikan false jika gagal mempersiapkan pernyataan SQL
        }

        $stmt->bind_param("ssssssssss", $nama_pupuk, $harga, $jumlah, $kegunaan, $detail_pupuk, $deskripsi_singkat , $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
    public function editPupuk($id,$nama_pupuk, $harga, $jumlah, $kegunaan, $detail_pupuk, $deskripsi_singkat , $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3) {
        $stmt = $this->conn->prepare("UPDATE `pupuk` SET `nama_pupuk`=?, `harga`=?, `jumlah`=?, `kegunaan`=?, `detail_pupuk`=?, `deskripsi_singkat`=? , `gambar_path_main`=?, `gambar_path_1`=?, `gambar_path_2`=?, `gambar_path_3`=? WHERE `id_pupuk`=?");
    
        if (!$stmt) {
            return false;
        }
    
        $stmt->bind_param("sssssssssss", $nama_pupuk, $harga, $jumlah, $kegunaan, $detail_pupuk, $deskripsi_singkat , $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3,$id);
        $result = $stmt->execute();
        $stmt->close();
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deletePupuk($id) {
        // Lakukan penghapusan data berdasarkan ID
        $query = "DELETE FROM `pupuk` WHERE `pupuk`.`id_pupuk` = $id";
        $result=mysqli_query($this->conn, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }   
}
?>
