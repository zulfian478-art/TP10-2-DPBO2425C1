<?php
require_once "controllers/TrackController.php";
$controller = new TrackController($db);

$albums = $controller->albums();

if ($_POST) {
    $controller->store($_POST);
    header("Location: index.php?page=tracks");
}
?>

<h2 class="h1">Add Track</h2>

<form method="POST">

    <label>Album</label>
    <select name="album_id" class="form-control" required>
        <option value="">-- Select Album --</option>
        <?php foreach($albums as $a): ?>
            <option value="<?= $a['album_id'] ?>"><?= $a['title'] ?></option>
        <?php endforeach; ?>
    </select>

    <label>Track Title</label>
    <input type="text" name="title" class="form-control" required>

    <label>Duration (mm:ss)</label>
    <input type="text" name="duration" class="form-control" placeholder="03:45">

    <br>
    <button class="btn">Save</button>
</form>
