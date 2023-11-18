<?php
class UserModel
{
    private $conn;

    public function __construct($conn)
    {
        if ($conn === null) {
            die("Database connection is not valid.");
        }
        $this->conn = $conn;
    }

    public function createUser($nama_depan, $nama_belakang, $alamat, $email, $no_handphone, $tanggal_lahir, $hak_akses, $password, $gambar_path_main)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->conn->prepare("INSERT INTO `users` (`id_user`, `nama_depan`, `nama_belakang`, `alamat`, `email`, `no_handphone`, `tanggal_lahir`, `hak_akses`, `password`, `tanggal_daftar`, `gambar_path`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, current_timestamp(), ?)");

        if (!$stmt) {
            return false; // Failed to prepare the SQL statement
        }

        $stmt->bind_param("sssssssss", $nama_depan, $nama_belakang, $alamat, $email, $no_handphone, $tanggal_lahir, $hak_akses, $hashedPassword, $gambar_path_main);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function emailExists($email)
    {
        $stmt = $this->conn->prepare("SELECT id_user FROM users WHERE email = ?");

        if (!$stmt) {
            return false; // Failed to prepare the SQL statement
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $count = $stmt->num_rows;
        $stmt->close();

        return $count > 0;
    }

    public function authenticateUser($email, $password)
    {
        $stmt = $this->conn->prepare("SELECT id_user, password FROM users WHERE email = ?");

        if (!$stmt) {
            return false; // Failed to prepare the SQL statement
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        $id = null; // Initialize $id
        $hashedPassword = null; // Initialize $hashedPassword

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $hashedPassword);
            $stmt->fetch();

            if (password_verify($password, $hashedPassword)) {
                // Password is correct, user is authenticated
                return true;
            }
        }

        // Invalid email or password
        return false;
    }
    public function deleteUser($id) {
        // Lakukan penghapusan data berdasarkan ID
        $query = "DELETE FROM `users` WHERE `users`.`id_user` = $id";
        $result=mysqli_query($this->conn, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }   
    public function editUser($id, $nama_depan, $nama_belakang, $alamat, $email, $no_handphone, $tanggal_lahir, $hak_akses, $password, $tanggal_daftar, $gambar_path_main) {
        $stmt = $this->conn->prepare("UPDATE `users` SET `nama_depan`=?,`nama_belakang`=?, `alamat`=?, `email`=?, `no_handphone`=?, `tanggal_lahir`=?, `hak_akses`=?, `password`=?, `tanggal_daftar`=?,`gambar_path`=? WHERE `id_user`=?");
    
        if (!$stmt) {
            return false;
        }
    
        $stmt->bind_param("sssssssssss", $nama_depan, $nama_belakang, $alamat, $email, $no_handphone, $tanggal_lahir, $hak_akses, $password, $tanggal_daftar, $gambar_path_main, $id);
        $result = $stmt->execute();
        $stmt->close();
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

?>