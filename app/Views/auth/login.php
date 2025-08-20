<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
                <?php if(session()->get('error')): ?>
                    <div class="alert alert-danger"><?= session()->get('error') ?></div>
                <?php endif; ?>
                <?php if(session()->get('success')): ?>
                    <div class="alert alert-success"><?= session()->get('success') ?></div>
                <?php endif; ?>

                <form action="/login" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <p>Don't have an account? <a href="/register">Create one here</a></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>