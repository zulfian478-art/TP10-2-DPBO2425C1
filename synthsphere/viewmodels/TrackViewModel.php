<?php

class TrackViewModel {
    private $model;

    public function __construct($trackModel){
        $this->model = $trackModel;
    }

    public function getTracks(){
        return $this->model->getAll();
    }
}
