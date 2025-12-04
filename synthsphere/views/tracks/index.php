<?php include __DIR__."/../template/header.php"; ?>

<h2>Tracks</h2>
<a href="index.php?page=tracks&action=form" class="btn">+ Add Track</a>

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
    <td class="actions">
        <a class="btn-ghost" href="index.php?page=tracks&action=form&id=<?= $t['track_id'] ?>">Edit</a>
        <a class="btn-ghost"
           href="index.php?page=tracks&action=delete&id=<?= $t['track_id'] ?>"
           onclick="return confirm('Delete this track?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<?php include __DIR__."/../template/footer.php"; ?>