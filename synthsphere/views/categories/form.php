<?php 
// Perlu dipastikan variabel $category tersedia
include __DIR__ . '/../template/header.php'; 
?>

<h2 class="h1">
    <?= $category ? "Edit Category" : "Add new Category" ?>
</h2>

<form method="POST" action="index.php?page=categories&action=<?= $category ? "update" : "store" ?>">

    <?php if ($category): ?>
        <input type="hidden" name="category_id" value="<?= $category['category_id'] ?>">
    <?php endif; ?>

    <label class="form-label">Category Name</label>
    <input type="text" name="name" class="form-control" value="<?= $category['name'] ?? '' ?>" required>
    
    <br>
    <button type="submit" class="btn">Save</button>
    <a href="index.php?page=categories" class="btn-ghost">Cancel</a>
</form>

<?php include __DIR__ . '/../template/footer.php'; ?>