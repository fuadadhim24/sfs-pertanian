<?php
class LiterasiModel
{
    private $conn;

    public function __construct($conn)
    {
        if ($conn === null) {
            die("Database connection is not valid.");
        }
        $this->conn = $conn;
    }

    public function createLiterasi($bentuk_kategori, $jenis, $judul, $tanggal, $deskripsi , $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3) {
        $stmt = $this->conn->prepare("INSERT INTO `literasi` (`id_literasi`, `bentuk_kategori`, `jenis`, `judul`, `tanggal`, `deskripsi` , `gambar_path_main`, `gambar_path_1`, `gambar_path_2`, `gambar_path_3`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if (!$stmt) {
            return false; // Kembalikan false jika gagal mempersiapkan pernyataan SQL
        }

        $stmt->bind_param("sssssssss", $bentuk_kategori, $jenis, $judul, $tanggal, $deskripsi , $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
    public function editLiterasi($id, $bentuk_kategori, $jenis, $judul, $tanggal, $deskripsi , $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3) {
        $stmt = $this->conn->prepare("UPDATE `literasi` SET `bentuk_kategori`=?, `jenis`=?, `judul`=?, `tanggal`=?, `deskripsi`=? , `gambar_path_main`=?, `gambar_path_1`=?, `gambar_path_2`=?, `gambar_path_3`=? WHERE `id_literasi`=?");
    
        if (!$stmt) {
            return false;
        }
    
        $stmt->bind_param("ssssssssss", $bentuk_kategori, $jenis, $judul, $tanggal, $deskripsi , $gambar_path_main, $gambar_path_1, $gambar_path_2, $gambar_path_3, $id);
        $result = $stmt->execute();
        $stmt->close();
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteLiterasi($id) {
        // Lakukan penghapusan data berdasarkan ID
        $query = "DELETE FROM `literasi` WHERE `literasi`.`id_literasi` = $id";
        $result=mysqli_query($this->conn, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }   
}
?>
