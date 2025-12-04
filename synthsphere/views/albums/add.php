<?php
require_once "controllers/AlbumController.php";
$controller = new AlbumController($db);

$artists = $controller->artists();

if ($_POST) {
    // Mengganti 'released_year' menjadi 'release_date'
    $_POST['release_date'] = $_POST['released_year']; // Simpan nilai dari form
    unset($_POST['released_year']); // Hapus key lama jika ada
    $controller->store($_POST);
    header("Location: index.php?page=albums");
}
?>

<h2 class="h1">Add Album</h2>

<form method="POST">
    <label>Artist</label>
    <select name="artist_id" class="form-control" required>
        <option value="">-- Select Artist --</option>
        <?php foreach($artists as $a): ?>
            <option value="<?= $a['artist_id'] ?>"><?= $a['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <label>Album Title</label>
    <input type="text" name="title" class="form-control" required>

    <label>Release Date</label> <input type="date" name="released_year" class="form-control"> <br>
    <button class="btn">Save</button>
</form>