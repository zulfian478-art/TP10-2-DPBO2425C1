<?php
// Pastikan model Instrument dan Category sudah di-include
require_once __DIR__ . "/../models/Instrument.php";
require_once __DIR__ . "/../models/Category.php"; // <--- Tambahkan ini

class InstrumentController {
    private $model;
    private $categoryModel; // Deklarasi properti untuk model Category

    public function __construct($db) {
        $this->model = new Instrument($db);
        // Inisialisasi model Category di constructor
        $this->categoryModel = new Category($db); 
    }

    public function index() {
        return $this->model->getAll();
    }
    
    // METHOD HILANG YANG MENYEBABKAN ERROR
    public function categories() {
        // Memanggil metode getAll() dari model Category untuk mendapatkan daftar kategori
        return $this->categoryModel->getAll();
    }

    public function store($data) {
        // Memastikan parameter price terkirim, menggunakan null sebagai default jika tidak ada
        return $this->model->create($data['name'], $data['type'], $data['price'] ?? null);
    }

    public function edit($id) {
        return $this->model->find($id);
    }

    public function update($id, $data) {
        // Memastikan parameter price terkirim
        return $this->model->update($id, $data['name'], $data['type'], $data['price'] ?? null);
    }

    public function delete($id) {
        return $this->model->delete($id);
    }
}