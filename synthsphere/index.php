<?php
// Tentukan path base folder (sesuaikan jika Anda menaruhnya di sub-folder)
// define('BASE_PATH', __DIR__ . '/');

// 1. Ambil Koneksi Database
require_once __DIR__.'/config/database.php';
$db = (new Database())->getConnection();

// 2. Ambil parameter page dan action dari URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// 3. Routing
switch ($page) {

    case 'artists':
        require_once __DIR__.'/controllers/ArtistController.php';
        $c = new ArtistController($db);

        if ($action == 'index') {
            $artists = $c->index();
            include __DIR__.'/views/artists/index.php';
        }
        else if ($action == 'form') {
            $id = $_GET['id'] ?? null;
            $artist = null;
            if ($id) { $artist = $c->edit($id); }
            include __DIR__.'/views/artists/form.php';
        }
        else if ($action == 'store' && $_POST) {
            $c->store($_POST);
            header("Location: index.php?page=artists");
            exit;
        }
        else if ($action == 'update' && $_POST) {
            $id = $_POST['id'];
            $c->update($id, $_POST);
            header("Location: index.php?page=artists");
            exit;
        }
        else if ($action == 'delete') {
            $c->delete($_GET['id']);
            header("Location: index.php?page=artists");
            exit;
        }
        break;

    case 'albums':
        require_once __DIR__.'/controllers/AlbumController.php';
        $c = new AlbumController($db);

        if ($action == 'index') {
            $albums = $c->index();
            include __DIR__.'/views/albums/index.php';
        }
        else if ($action == 'form') {
            $id = $_GET['id'] ?? null;
            $album = null;
            $artists = $c->artists(); // Untuk dropdown
            if ($id) { $album = $c->edit($id); }
            include __DIR__.'/views/albums/form.php';
        }
        else if ($action == 'store' && $_POST) {
            // Menggunakan 'year' dari form, diubah menjadi 'release_date'
            $data = $_POST;
            $data['release_date'] = $data['year'] . '-01-01'; // Asumsi tanggal 1 Januari
            $c->store($data);
            header("Location: index.php?page=albums");
            exit;
        }
        else if ($action == 'update' && $_POST) {
            $id = $_POST['id'];
            $data = $_POST;
            $data['release_date'] = $data['year'] . '-01-01'; // Asumsi tanggal 1 Januari
            $c->update($id, $data);
            header("Location: index.php?page=albums");
            exit;
        }
        else if ($action == 'delete') {
            $c->delete($_GET['id']);
            header("Location: index.php?page=albums");
            exit;
        }
        break;
        
    case 'tracks':
        require_once __DIR__.'/controllers/TrackController.php';
        $c = new TrackController($db);

        if ($action == 'index') {
            $tracks = $c->index();
            include __DIR__.'/views/tracks/index.php';
        }
        else if ($action == 'form') {
            $id = $_GET['id'] ?? null;
            $track = null;
            $albums = $c->albums(); // Untuk dropdown
            if ($id) { $track = $c->edit($id); }
            include __DIR__.'/views/tracks/form.php';
        }
        else if ($action == 'store' && $_POST) {
            $c->store($_POST);
            header("Location: index.php?page=tracks");
            exit;
        }
        else if ($action == 'update' && $_POST) {
            $c->update($_POST['id'], $_POST);
            header("Location: index.php?page=tracks");
            exit;
        }
        else if ($action == 'delete') {
            $c->delete($_GET['id']);
            header("Location: index.php?page=tracks");
            exit;
        }
        break;

    case 'instruments':
        require_once __DIR__.'/controllers/InstrumentController.php';
        $c = new InstrumentController($db);
        
        // Untuk data binding di list view
        require_once __DIR__.'/models/Category.php';
        $categoryModel = new Category($db);
        $categories = $categoryModel->getAll();

        if ($action == 'index') {
            $instruments = $c->index();
            include __DIR__.'/views/instruments/index.php';
        }
        else if ($action == 'form') {
            $id = $_GET['id'] ?? null;
            $instrument = null;
            $categories_list = $c->categories(); // Untuk dropdown di form
            if ($id) { $instrument = $c->edit($id); }
            include __DIR__.'/views/instruments/form.php';
        }
        else if ($action == 'store' && $_POST) {
            $c->store($_POST);
            header("Location: index.php?page=instruments");
            exit;
        }
        else if ($action == 'update' && $_POST) {
            $c->update($_POST['id'], $_POST);
            header("Location: index.php?page=instruments");
            exit;
        }
        else if ($action == 'delete') {
            $c->delete($_GET['id']);
            header("Location: index.php?page=instruments");
            exit;
        }
        break;
        
    case 'categories':
        require_once __DIR__.'/controllers/CategoryController.php';
        $c = new CategoryController($db);

        if ($action == 'index') {
            // Controller akan memuat view-nya sendiri
            $c->index(); 
        }
        else if ($action == 'form') {
            $id = $_GET['id'] ?? null;
            $c->form($id); 
        }
        else if ($action == 'store' && $_POST) {
            $c->store($_POST);
        }
        else if ($action == 'update' && $_POST) {
            $c->update($_POST['category_id'], $_POST);
        }
        else if ($action == 'delete') {
            $c->delete($_GET['id']);
        }
        break;

    default:
        // Halaman Home sederhana
        include __DIR__.'/views/template/header.php';
        echo "<h2 class='h1'>Welcome to SynthSphere!</h2>";
        echo "<p>Please navigate using the links in the header.</p>";
        include __DIR__.'/views/template/footer.php';
        break;
}