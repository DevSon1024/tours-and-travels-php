<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h4>Edit Profile</h4>
    </div>
    <div class="card-body">
        <form action="/profile/update" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?= esc($user['name']) ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= esc($user['email']) ?>">
            </div>
            <button type="submit" class="btn btn-success">Update Profile</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>