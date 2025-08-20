<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h4>Admin Profile</h4>
    </div>
    <div class="card-body">
        <p><strong>Name:</strong> <?= esc($user['name']) ?></p>
        <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
        <p><strong>Role:</strong> <?= esc(ucfirst($user['role'])) ?></p>
    </div>
</div>
<?= $this->endSection() ?>