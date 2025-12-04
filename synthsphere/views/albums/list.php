<?php
require_once "controllers/AlbumController.php";
$controller = new AlbumController($db);

$albums = $controller->index();
?>

<h2 class="h1">Albums</h2>
<a href="index.php?page=albums_add" class="btn">+ Add Album</a>

<table class="table">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Artist</th>
    <th>Release Date</th> <th>Actions</th>
</tr>

<?php foreach ($albums as $row): ?>
<tr>
    <td><?= $row['album_id'] ?></td>
    <td><?= htmlspecialchars($row['title']) ?></td>
    <td><?= htmlspecialchars($row['artist_name']) ?></td>
    <td><?= $row['release_date'] ?></td> <td>
        <a class="btn-ghost" href="index.php?page=albums_edit&id=<?= $row['album_id'] ?>">Edit</a>
        <a class="btn-ghost" 
           href="index.php?page=albums_delete&id=<?= $row['album_id'] ?>"
           onclick="return confirm('Delete album?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>