<?php
class SemprotanModel
{
    private $conn;

    public function __construct($conn)
    {
        if ($conn === null) {
            die("Database connection is not valid.");
        }
        $this->conn = $conn;
    }

    public function createSemprotan($nama_semprotan, $harga, $kategori, $jumlah, $kegunaan, $detail_semprotan, $deskripsi_singkat , $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3) {
        $stmt = $this->conn->prepare("INSERT INTO `semprotan` (`id_semprotan`,`nama_semprotan`, `harga`, `kategori`,`jumlah`, `kegunaan`, `detail_semprotan`, `deskripsi_singkat` , `gambar_path_main`, `gambar_path_1`, `gambar_path_2`, `gambar_path_3`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if (!$stmt) {
            return false; // Kembalikan false jika gagal mempersiapkan pernyataan SQL
        }

        $stmt->bind_param("ssssssssss", $nama_semprotan, $harga, $kategori, $jumlah, $kegunaan, $detail_semprotan, $deskripsi_singkat , $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
    public function editSemprotan($id,$nama_semprotan, $harga, $kategori, $jumlah, $kegunaan, $detail_semprotan, $deskripsi_singkat , $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3) {
        $stmt = $this->conn->prepare("UPDATE `semprotan` SET `nama_semprotan`=?, `harga`=?, `kategori`=?, `jumlah`=?, `kegunaan`=?, `detail_semprotan`=?, `deskripsi_singkat`=? , `gambar_path_main`=?, `gambar_path_1`=?, `gambar_path_2`=?, `gambar_path_3`=? WHERE `id_semprotan`=?");
    
        if (!$stmt) {
            return false;
        }
    
        $stmt->bind_param("ssssssssssss", $nama_semprotan, $harga, $kategori, $jumlah, $kegunaan, $detail_semprotan, $deskripsi_singkat , $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3, $id);
        $result = $stmt->execute();
        $stmt->close();
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteSemprotan($id) {
        // Lakukan penghapusan data berdasarkan ID
        $query = "DELETE FROM `semprotan` WHERE `semprotan`.`id_semprotan` = $id";
        $result=mysqli_query($this->conn, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }   
}
?>
