<?php
require_once "controllers/ArtistController.php";
$controller = new ArtistController($db);

$id = $_GET['id'];
$data = $controller->edit($id);

if ($_POST) {
    $controller->update($id, $_POST);
    header("Location: index.php?page=artists");
}
?>

<div class="container">
  <h1 class="h1">Edit Artist</h1>

  <form method="POST">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="<?= $data['name'] ?>" required>

    <label>Genre</label>
    <input type="text" name="genre" class="form-control" value="<?= $data['genre'] ?>">

    <br>
    <button class="btn">Update</button>
  </form>
</div>
