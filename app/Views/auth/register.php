<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Register</div>
            <div class="card-body">
                <?php if(session()->get('errors')): ?>
                    <div class="alert alert-danger">
                        <ul>
                        <?php foreach (session()->get('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="/register" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" value="<?= old('name') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" value="<?= old('email') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirm" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirm" required>
                    </div>
                    <button type="submit" class="btn btn-success">Create Account</button>
                </form>
            </div>
             <div class="card-footer text-center">
                <p>Already have an account? <a href="/login">Sign in here</a></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>