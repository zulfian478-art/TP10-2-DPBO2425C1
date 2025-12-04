<?php
require_once "controllers/ArtistController.php";
$controller = new ArtistController($db);
$artists = $controller->index();
?>

<div class="container">
  <div class="header">
    <div class="brand">
      <div class="logo"></div>
      <h1 class="h1">Artists</h1>
    </div>
    <a href="index.php?page=artists_add" class="btn">+ Add Artist</a>
  </div>

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
      <td><?= $row['name'] ?></td>
      <td><?= $row['genre'] ?></td>
      <td class="actions">
        <a class="btn-ghost" href="index.php?page=artists_edit&id=<?= $row['artist_id'] ?>">Edit</a>
        <a class="btn-ghost" href="index.php?page=artists_delete&id=<?= $row['artist_id'] ?>"
           onclick="return confirm('Delete this artist?')">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
