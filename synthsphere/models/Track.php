<?php
class Track {
    private $conn;
    private $table = "tracks";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Mengambil semua track + nama album
    // models/Track.php
    public function getAll() {
        $query = "
            SELECT t.*, a.title AS album_title
            FROM tracks t
            JOIN albums a ON t.album_id = a.album_id
            ORDER BY t.track_id DESC
        ";
        return $this->conn->query($query); // Jika Anda mengikuti Opsi 1, tambahkan ->fetchAll() di sini
    }
    
    // Mengambil semua album untuk dropdown
    public function getAlbums() {
        return $this->conn->query("SELECT album_id, title FROM albums ORDER BY title ASC")->fetchAll(PDO::FETCH_ASSOC);
    }

    // Membuat track baru
    public function create($album_id, $title, $duration) {
        $stmt = $this->conn->prepare(
            "INSERT INTO tracks (album_id, title, duration) VALUES (?,?,?)"
        );
        return $stmt->execute([$album_id, $title, $duration]);
    }

    // Mencari track berdasarkan ID
    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM tracks WHERE track_id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mengupdate data track
    public function update($id, $album_id, $title, $duration) {
        $stmt = $this->conn->prepare(
            "UPDATE tracks SET album_id=?, title=?, duration=? WHERE track_id=?"
        );
        return $stmt->execute([$album_id, $title, $duration, $id]);
    }

    // Menghapus track
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE track_id=?");
        return $stmt->execute([$id]);
    }
}