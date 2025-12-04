<?php
require_once __DIR__ . "/../models/Album.php";
require_once __DIR__ . "/../models/Artist.php"; // Tambahkan Model Artist

class AlbumController {
    private $albumModel;
    private $artistModel;

    public function __construct($db) {
        $this->albumModel = new Album($db);
        $this->artistModel = new Artist($db); // Inisialisasi Model Artist
    }

    public function index() {
        return $this->albumModel->getAll(); // Sudah di-join di Model Album
    }
    
    // Method untuk mengambil daftar artis (untuk dropdown di form)
    public function artists() {
        return $this->artistModel->getAll();
    }

    public function store($data) {
        // Asumsi form menggunakan 'release_date'
        return $this->albumModel->create($data['title'], $data['artist_id'], $data['release_date']);
    }

    public function edit($id) {
        return $this->albumModel->find($id);
    }

    public function update($id, $data) {
        // Asumsi form menggunakan 'release_date'
        return $this->albumModel->update($id, $data['title'], $data['artist_id'], $data['release_date']);
    }

    public function delete($id) {
        return $this->albumModel->delete($id);
    }
}