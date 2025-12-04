<?php
require_once "controllers/TrackController.php";
$controller = new TrackController($db);

$id = $_GET['id'];
$data = $controller->edit($id);
$albums = $controller->albums();

if ($_POST) {
    $controller->update($id, $_POST);
    header("Location: index.php?page=tracks");
}
?>

<h2 class="h1">Edit Track</h2>

<form method="POST">

    <label>Album</label>
    <select name="album_id" class="form-control" required>
        <?php foreach($albums as $a): ?>
            <option value="<?= $a['album_id'] ?>"
                <?= $a['album_id'] == $data['album_id'] ? 'selected' : '' ?>>
                <?= $a['title'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Track Title</label>
    <input type="text" name="title" class="form-control"
           value="<?= $data['title'] ?>" required>

    <label>Duration</label>
    <input type="text" name="duration" class="form-control"
           value="<?= $data['duration'] ?>">

    <br>
    <button class="btn">Update</button>
</form>
