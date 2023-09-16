<?php
class UserModel
{
    private $db;

    public function __construct($db)
    {
        if ($db === null) {
            die("Database connection is not valid.");
        }
        $this->db = $db;
    }

    public function createUser($username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (id_user, username, email, password) VALUES (NULL, ?, ?, ?)");

        if (!$stmt) {
            return false; // Failed to prepare the SQL statement
        }

        $stmt->bind_param("sss", $username, $email, $hashedPassword);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function emailExists($email)
    {
        $stmt = $this->db->prepare("SELECT id_user FROM users WHERE email = ?");

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
        $stmt = $this->db->prepare("SELECT id_user, password FROM users WHERE email = ?");

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
}

?>