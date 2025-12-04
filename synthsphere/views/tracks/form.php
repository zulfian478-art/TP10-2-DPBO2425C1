<?php 
// Perlu dipastikan variabel $albums tersedia dari TrackController
include __DIR__."/../template/header.php"; 
?>

<h2><?= isset($track) ? "Edit Track" : "Add Track" ?></h2>

<form method="POST" action="index.php?page=tracks&action=<?= isset($track) ? 'update' : 'store' ?>">

    <?php if (isset($track)): ?>
        <input type="hidden" name="id" value="<?= $track['track_id'] ?>">
    <?php endif; ?>

    <label>Album</label>
    <select name="album_id" class="form-control" required>
        <option value="">-- Select Album --</option>
        <?php foreach($albums as $a): ?>
            <option value="<?= $a['album_id'] ?>"
                <?= isset($track) && $a['album_id'] == $track['album_id'] ? 'selected' : '' ?>>
                <?= $a['title'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Track Title</label>
    <input type="text" name="title" class="form-control" 
           value="<?= $track['title'] ?? '' ?>" required>

    <label>Duration (mm:ss)</label>
    <input type="text" name="duration" class="form-control" 
           value="<?= $track['duration'] ?? '' ?>" placeholder="03:45" required>

    <br>
    <button type="submit" class="btn">Save</button>
    <a href="index.php?page=tracks" class="btn-ghost">Cancel</a>
</form>

<?php include __DIR__."/../template/footer.php"; ?>