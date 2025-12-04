<?php include __DIR__."/../template/header.php"; ?>

<h2>Artists</h2>
<a href="index.php?page=artists&action=form" class="btn">+ Add Artist</a>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Genre</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($artists as $row): ?>
        <tr>
            <td><?= $row['artist_id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['genre']) ?></td>
            <td class="actions">
                <a class="btn-ghost" href="index.php?page=artists&action=form&id=<?= $row['artist_id'] ?>">Edit</a>
                <a class="btn-ghost" href="index.php?page=artists&action=delete&id=<?= $row['artist_id'] ?>" 
                   onclick="return confirm('Delete this artist?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<?php include __DIR__."/../template/footer.php"; ?>