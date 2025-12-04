<?php
require_once "controllers/ArtistController.php";
$controller = new ArtistController($db);

if ($_POST) {
    $controller->store($_POST);
    header("Location: index.php?page=artists");
}
?>

<div class="container">
  <h1 class="h1">Add Artist</h1>

  <form method="POST">
    <label>Name</label>
    <input type="text" name="name" class="form-control" required>

    <label>Genre</label>
    <input type="text" name="genre" class="form-control">

    <br>
    <button class="btn">Save</button>
  </form>
</div>
