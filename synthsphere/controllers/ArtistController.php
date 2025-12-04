<?php
require_once __DIR__ . "/../models/Artist.php";

class ArtistController {
    private $model;

    public function __construct($db) {
        $this->model = new Artist($db);
    }

    public function index() {
        return $this->model->getAll();  
    }

    public function edit($id) {
        return $this->model->find($id);
    }

    public function store($data) {
        return $this->model->create($data['name'], $data['genre']);
    }

    public function update($id, $data) {
        return $this->model->update($id, $data['name'], $data['genre']);
    }

    public function delete($id) {
        return $this->model->delete($id);
    }
}