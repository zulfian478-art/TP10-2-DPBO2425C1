<?php
require_once __DIR__ . "/../models/Track.php";
require_once __DIR__ . "/../models/Album.php"; // Tambahkan Model Album

class TrackController {
    private $trackModel;
    private $albumModel;

    public function __construct($db) {
        $this->trackModel = new Track($db);
        $this->albumModel = new Album($db);
    }

    public function index() {
        return $this->trackModel->getAll(); // Sudah di-join di Model Track
    }
    
    // Method untuk mengambil daftar album (untuk dropdown di form)
    public function albums() {
        return $this->trackModel->getAlbums(); 
    }

    public function store($data) {
        return $this->trackModel->create($data['album_id'], $data['title'], $data['duration']);
    }

    public function edit($id) {
        return $this->trackModel->find($id);
    }

    public function update($id, $data) {
        return $this->trackModel->update($id, $data['album_id'], $data['title'], $data['duration']);
    }

    public function delete($id) {
        return $this->trackModel->delete($id);
    }
}