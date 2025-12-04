<?php
require_once "controllers/TrackController.php";
$controller = new TrackController($db);

$tracks = $controller->index();
?>

<h2 class="h1">Tracks</h2>
<a href="index.php?page=tracks_add" class="btn">+ Add Track</a>

<table class="table">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Album</th>
    <th>Duration</th>
    <th>Actions</th>
</tr>

<?php foreach ($tracks as $t): ?>
<tr>
    <td><?= $t['track_id'] ?></td>
    <td><?= htmlspecialchars($t['title']) ?></td>
    <td><?= htmlspecialchars($t['album_title']) ?></td>
    <td><?= htmlspecialchars($t['duration']) ?></td>
    <td>
        <a class="btn-ghost" href="index.php?page=tracks_edit&id=<?= $t['track_id'] ?>">Edit</a>
        <a class="btn-ghost"
           href="index.php?page=tracks_delete&id=<?= $t['track_id'] ?>"
           onclick="return confirm('Delete this track?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
