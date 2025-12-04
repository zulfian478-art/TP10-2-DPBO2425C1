<?php
class Album {
    private $conn;
    private $table = "albums";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Mengambil semua album + nama artis
   // models/Album.php - SESUDAH
public function getAll() {
    // Mengubahnya agar langsung mengambil semua hasil sebagai array
    $stmt = $this->conn->query("SELECT * FROM $this->table ORDER BY album_id DESC");
    return $stmt->fetchAll();
    // ATAU: return $this->conn->query("SELECT * FROM $this->table ORDER BY album_id DESC")->fetchAll();
    }

    // Membuat album baru
    public function create($title, $artist_id, $release_date) {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (title, artist_id, release_date) VALUES (?,?,?)");
        // Di sini saya menggunakan $release_date, bukan $year, untuk konsistensi dengan SQL DATE.
        return $stmt->execute([$title, $artist_id, $release_date]); 
    }

    // Mencari album berdasarkan ID
    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE album_id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mengupdate data album
    public function update($id, $title, $artist_id, $release_date) {
        $stmt = $this->conn->prepare("UPDATE $this->table SET title=?, artist_id=?, release_date=? WHERE album_id=?");
        return $stmt->execute([$title, $artist_id, $release_date, $id]);
    }

    // Menghapus album
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE album_id=?");
        return $stmt->execute([$id]);
    }
}