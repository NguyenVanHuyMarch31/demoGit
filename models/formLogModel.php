<?php

class formLogModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function postRegisterUser($username, $email, $password)
    {
        try {
            $sql = 'INSERT INTO users (username, email, password) VALUES (:username, :email, :password)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':password' => $password
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Lỗi khi thêm người dùng: " . $e->getMessage();
            return false;
        }
    }
    public function verifyUser($username, $password)
    {
        $sql = 'SELECT password FROM users WHERE username = :username';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':username' => $username]);

        $hashedPassword = $stmt->fetchColumn();
        if ($hashedPassword && password_verify($password, $hashedPassword)) {
            return true;
        }
        return false;
    }
}
