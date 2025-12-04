<?php
require_once "controllers/AlbumController.php";
$controller = new AlbumController($db);

$id = $_GET['id'];
$data = $controller->edit($id);
$artists = $controller->artists();

if ($_POST) {
    // Mengganti 'released_year' menjadi 'release_date'
    $_POST['release_date'] = $_POST['released_year']; // Simpan nilai dari form
    unset($_POST['released_year']); // Hapus key lama jika ada
    $controller->update($id, $_POST);
    header("Location: index.php?page=albums");
}
?>

<h2 class="h1">Edit Album</h2>

<form method="POST">
    <label>Artist</label>
    <select name="artist_id" class="form-control" required>
        <?php foreach($artists as $a): ?>
            <option value="<?= $a['artist_id'] ?>"
                <?= $a['artist_id'] == $data['artist_id'] ? 'selected' : '' ?>>
                <?= $a['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Album Title</label>
    <input type="text" name="title" class="form-control"
           value="<?= $data['title'] ?>" required>

    <label>Release Date</label> <input type="date" name="released_year" class="form-control"
           value="<?= $data['release_date'] ?>"> <br>
    <button class="btn">Update</button>
</form>