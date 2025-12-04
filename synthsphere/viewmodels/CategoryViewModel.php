<?php
require_once __DIR__ . '/../models/Category.php';

class CategoryViewModel {

    private $category;

    public function __construct($db) {
        $this->category = new Category($db);
    }

    public function getAll() {
        return $this->category->getAll();
    }
}
