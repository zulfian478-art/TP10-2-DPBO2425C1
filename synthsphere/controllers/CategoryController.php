<?php
require_once __DIR__ . '/../models/Category.php';

class CategoryController {
    private $model;

    public function __construct($db) {
        $this->model = new Category($db);
    }

    public function index() {
        $categories = $this->model->getAll();
        // Memuat view index
        include __DIR__ . '/../views/categories/index.php';
    }

    public function form($id = null) {
        $category = null;
        if ($id) { 
            $category = $this->model->find($id); // Menggunakan find() dari model
        }
        // Memuat view form
        include __DIR__ . '/../views/categories/form.php';
    }

    public function store($data) {
        $this->model->create($data['name']);
        header("Location: index.php?page=categories");
        exit;
    }

    public function update($id, $data) {
        $this->model->update($id, $data['name']);
        header("Location: index.php?page=categories");
        exit;
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: index.php?page=categories");
        exit;
    }
}