<?php
class Category {
    private $conn;
    private $table = "categories";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Mengambil semua kategori
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} ORDER BY name ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Mencari kategori berdasarkan ID
    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE category_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Membuat kategori baru
    public function create($name) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name) VALUES (?)");
        return $stmt->execute([$name]);
    }

    // Mengupdate data kategori
    public function update($id, $name) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET name=? WHERE category_id=?");
        return $stmt->execute([$name, $id]);
    }

    // Menghapus kategori
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE category_id=?");
        return $stmt->execute([$id]);
    }
}