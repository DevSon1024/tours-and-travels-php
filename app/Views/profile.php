<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h4>My Profile</h4>
    </div>
    <div class="card-body">
        <p><strong>Name:</strong> <?= esc($user['name']) ?></p>
        <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
        <a href="/profile/edit" class="btn btn-primary">Edit Profile</a>
        <a href="/profile/delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</a>
    </div>
</div>
<?= $this->endSection() ?>