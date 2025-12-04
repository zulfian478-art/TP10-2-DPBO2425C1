<?php 
// Perlu dipastikan variabel $artists tersedia dari AlbumController
$year = isset($album) ? date('Y', strtotime($album['release_date'])) : '';
include __DIR__."/../template/header.php"; 
?>

<h2><?= isset($album) ? "Edit Album" : "Add Album" ?></h2>

<form method="POST" action="index.php?page=albums&action=<?= isset($album) ? 'update' : 'store' ?>">
    
    <?php if (isset($album)): ?>
        <input type="hidden" name="id" value="<?= $album['album_id'] ?>">
    <?php endif; ?>

    <label>Artist</label>
    <select name="artist_id" class="form-control" required>
        <option value="">-- Select Artist --</option>
        <?php foreach($artists as $a): ?>
            <option value="<?= $a['artist_id'] ?>"
                <?= isset($album) && $a['artist_id'] == $album['artist_id'] ? 'selected' : '' ?>>
                <?= $a['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Album Title</label>
    <input type="text" name="title" class="form-control" 
           value="<?= $album['title'] ?? '' ?>" required>

    <label>Released Year</label>
    <input type="number" name="year" class="form-control"
           value="<?= $year ?>" 
           min="1900" max="<?= date('Y') ?>" required>

    <br>
    <button type="submit" class="btn">Save</button>
    <a href="index.php?page=albums" class="btn-ghost">Cancel</a>
</form>

<?php include __DIR__."/../template/footer.php"; ?>