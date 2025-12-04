<?php include __DIR__."/../template/header.php"; ?>

<h2><?= isset($instrument) ? "Edit Instrument" : "Add Instrument" ?></h2>

<form method="POST" action="index.php?page=instruments&action=<?= isset($instrument) ? 'update' : 'store' ?>">

    <?php if (isset($instrument)): ?>
        <input type="hidden" name="id" value="<?= $instrument['instrument_id'] ?>">
    <?php endif; ?>
    
    <label>Category</label><br>
    <select name="category_id" required>
        <option value="">-- Select Category --</option>
        <?php 
        // Variabel $categories harus didapatkan dari router/controller
        // Saya asumsikan Anda telah memperbarui router agar $categories tersedia
        foreach($categories as $cat): ?>
            <option value="<?= $cat['category_id'] ?>"
                <?= (isset($instrument) && $instrument['category_id'] == $cat['category_id']) ? 'selected' : '' ?>>
                <?= $cat['name'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>
    
    <label>Name</label><br>
    <input type="text" name="name" value="<?= $instrument['name'] ?? '' ?>" required><br><br>

    <label>Type</label><br>
    <input type="text" name="type" value="<?= $instrument['type'] ?? '' ?>" required><br><br>
    
    <label>Price</label><br>
    <input type="number" name="price" value="<?= $instrument['price'] ?? '' ?>"><br><br> <button type="submit">Save</button>
</form>

<?php include __DIR__."/../template/footer.php"; ?>