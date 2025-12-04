<?php
class Artist {
    private $conn;
    private $table = "artists";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Mengambil semua artis
    public function getAll() {
        $query = "SELECT * FROM $this->table ORDER BY artist_id DESC";
        return $this->conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Membuat artis baru
    public function create($name, $genre) {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (name, genre) VALUES (?, ?)");
        return $stmt->execute([$name, $genre]);
    }

    // Mencari artis berdasarkan ID
    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE artist_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mengupdate data artis
    public function update($id, $name, $genre) {
        $stmt = $this->conn->prepare("UPDATE $this->table SET name=?, genre=? WHERE artist_id=?");
        return $stmt->execute([$name, $genre, $id]);
    }

    // Menghapus artis
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE artist_id=?");
        return $stmt->execute([$id]);
    }
}