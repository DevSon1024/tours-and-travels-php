<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<h2>Edit Package</h2>
<form action="/admin/packages/update/<?= $package['id'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value="<?= esc($package['title']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3"><?= esc($package['description']) ?></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" step="0.01" class="form-control" name="price" value="<?= esc($package['price']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Package</button>
</form>
<?= $this->endSection() ?>