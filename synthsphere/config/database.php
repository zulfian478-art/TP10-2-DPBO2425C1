<?php
class Database {
    // Sesuaikan dengan pengaturan database Anda
    private $host = "127.0.0.1";
    private $db_name = "synthsphere";
    private $username = "root";
    private $password = ""; // <-- Ganti sesuai password MySQL/MariaDB Anda
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            // Hentikan eksekusi jika gagal koneksi
            die("Connection error: " . $e->getMessage());
        }
        return $this->conn;
    }
}