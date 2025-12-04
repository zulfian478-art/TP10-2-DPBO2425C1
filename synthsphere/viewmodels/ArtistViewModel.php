<?php

class ArtistViewModel {
    private $model;

    public function __construct($artistModel){
        $this->model = $artistModel;
    }

    public function getArtists(){
        return $this->model->getAll();
    }
}
