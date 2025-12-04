<?php
class InstrumentModel {
    private $conn; 
    private $table = "instruments";
    
    public function __construct($db){ 
        $this->conn = $db; 
    }

    // Metode getAll yang sudah ada
    public function getAll(){
        // Diasumsikan Anda sudah melakukan JOIN untuk mendapatkan nama kategori
        $query = "SELECT i.*, c.name AS category_name 
                  FROM {$this->table} i
                  JOIN categories c ON i.category_id = c.category_id
                  ORDER BY instrument_id DESC";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

   // ⭐ METODE BARU: getByCategory() ⭐
    public function getByCategory($category_id){
        // Jika ID 0, ambil semua data
        if ($category_id == 0) {
            $query = "SELECT name, price FROM {$this->table} ORDER BY name ASC";
            $stmt = $this->conn->query($query);
        } else {
            // Filter berdasarkan category_id
            $query = "SELECT name, price FROM {$this->table} WHERE category_id = :id ORDER BY name ASC";
            $stmt = $this->conn->prepare($query);
            // Binding parameter untuk mencegah SQL Injection
            $stmt->execute([':id'=>$category_id]);
        }
        
        // Pastikan Anda selalu mengembalikan data dalam format array asosiatif (FETCH_ASSOC)
        // agar JavaScript bisa memprosesnya dengan kunci 'name' dan 'price'.
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    
    // ... Metode lain (getById, insert, update, delete) yang sudah ada
}