<?php
require_once __DIR__ . '/../models/Instrument.php';

class InstrumentViewModel {

    private $instrumentModel;

    public function __construct() {
        $this->instrumentModel = new Instrument();
    }

    public function getByCategory($category_id) {
        return $this->instrumentModel->getByCategory($category_id);
    }
}
