<?php include __DIR__ . '/../template/header.php'; ?>

<h2 class="h1">Categories</h2>

<a href="index.php?page=categories&action=form" class="btn mb-3">+ Add Category</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th width="200px">Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($categories as $c): ?>
        <tr>
            <td><?= $c['category_id'] ?></td>
            <td><?= htmlspecialchars($c['name']) ?></td>
            <td class="actions">
                <a href="index.php?page=categories&action=form&id=<?= $c['category_id'] ?>" class="btn-ghost">Edit</a>
                <a href="index.php?page=categories&action=delete&id=<?= $c['category_id'] ?>" class="btn-ghost" onclick="return confirm('Delete this?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include __DIR__ . '/../template/footer.php'; ?>