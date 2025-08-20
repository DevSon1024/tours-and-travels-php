<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<h2>Manage Packages</h2>
<a href="/admin/packages/create" class="btn btn-primary mb-3">Add New Package</a>
<?php if(session()->get('success')): ?>
    <div class="alert alert-success"><?= session()->get('success') ?></div>
<?php endif; ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($packages as $package): ?>
        <tr>
            <td><?= $package['id'] ?></td>
            <td><?= esc($package['title']) ?></td>
            <td>₹<?= esc($package['price']) ?></td>
            <td>
                <a href="/admin/packages/edit/<?= $package['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="/admin/packages/delete/<?= $package['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this package?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>