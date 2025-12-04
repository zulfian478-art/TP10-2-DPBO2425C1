<?php include __DIR__."/../template/header.php"; ?>

<h2><?= isset($artist) ? "Edit" : "Add" ?> Artist</h2>

<form method="POST" 
      action="index.php?page=artists&action=<?= isset($artist) ? 'update' : 'store' ?>">

    <?php if (isset($artist)): ?>
        <input type="hidden" name="id" value="<?= $artist['artist_id'] ?>">
    <?php endif; ?>

    <label>Name</label><br>
    <input type="text" name="name" class="form-control" value="<?= $artist['name'] ?? '' ?>" required><br>

    <label>Genre</label><br>
    <input type="text" name="genre" class="form-control" value="<?= $artist['genre'] ?? '' ?>"><br>

    <button type="submit" class="btn">Save</button>
    <a href="index.php?page=artists" class="btn-ghost">Cancel</a>
</form>

<?php include __DIR__."/../template/footer.php"; ?>