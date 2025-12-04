<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/models/InstrumentModel.php';

// Pastikan file CategoryViewModel/Model juga dimuat jika dibutuhkan 
// (tetapi untuk binding hanya InstrumentModel yang dipanggil)

$db = (new Database())->getConnection();
$model = new InstrumentModel($db);

$category_id = $_GET['category_id'] ?? null;

// ⭐ PERBAIKAN PENTING DI SINI:
// Jika category_id tidak disetel, gunakan 0 (Semua)
if ($category_id === null) {
    $category_id = 0;
} else {
    // Pastikan nilai dikonversi menjadi integer
    $category_id = (int)$category_id;
}

// Tidak perlu cek if (!$category_id) lagi, karena model sudah menanganinya.
$data = $model->getByCategory($category_id);

header('Content-Type: application/json');
echo json_encode($data);
exit; // Pastikan tidak ada output lain setelah JSON