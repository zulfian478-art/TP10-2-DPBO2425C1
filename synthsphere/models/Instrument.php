<?php
class Instrument {
    private $conn;
    private $table = "instruments";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        // PERBAIKAN: Menghapus karakter atau komentar yang salah di query SQL.
        // Query SQL yang benar dan bersih untuk mengambil semua instrumen:
        $query = "SELECT * FROM " . $this->table . " ORDER BY instrument_id DESC";
        
        // Menggunakan fetchAll(PDO::FETCH_ASSOC) sesuai dengan file Anda yang lain
        return $this->conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE instrument_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $type, $price) { // Tambah $price sesuai model CRUD lain
        $stmt = $this->conn->prepare("
            INSERT INTO $this->table (name, type, price)
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([$name, $type, $price]);
    }

    public function update($id, $name, $type, $price) { // Tambah $price sesuai model CRUD lain
        $stmt = $this->conn->prepare("
            UPDATE $this->table SET name=?, type=?, price=? WHERE instrument_id=?
        ");
        return $stmt->execute([$name, $type, $price, $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE instrument_id=?");
        return $stmt->execute([$id]);
    }
}