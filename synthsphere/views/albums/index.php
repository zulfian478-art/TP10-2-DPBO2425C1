<?php include __DIR__."/../template/header.php"; ?>

<h2>Albums</h2>
<a href="index.php?page=albums&action=form" class="btn">+ Add Album</a>

<table class="table">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Artist</th>
    <th>Year</th>
    <th>Actions</th>
</tr>

<?php foreach ($albums as $row): ?>
<tr>
    <td><?= $row['album_id'] ?></td>
    <td><?= htmlspecialchars($row['title']) ?></td>
    <td><?= htmlspecialchars($row['artist_name']) ?></td> 
    <td><?= date('Y', strtotime($row['release_date'])) ?></td>
    <td class="actions">
        <a class="btn-ghost" href="index.php?page=albums&action=form&id=<?= $row['album_id'] ?>">Edit</a>
        <a class="btn-ghost" 
           href="index.php?page=albums&action=delete&id=<?= $row['album_id'] ?>"
           onclick="return confirm('Delete album?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<?php include __DIR__."/../template/footer.php"; ?>