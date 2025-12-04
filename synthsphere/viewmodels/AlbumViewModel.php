<?php

class AlbumViewModel {
    private $model;

    public function __construct($albumModel){
        $this->model = $albumModel;
    }

    public function getAlbums(){
        return $this->model->getAll();
    }
}
