<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<h2>Site Settings</h2>
<?php if(session()->get('success')): ?>
    <div class="alert alert-success"><?= session()->get('success') ?></div>
<?php endif; ?>
<div class="card">
    <div class="card-body">
        <form action="/admin/settings/update" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="background_url" class="form-label">Landing Page Background Image URL</label>
                <input type="text" class="form-control" name="background_url" value="<?= esc($background['setting_value']) ?>">
            </div>
            <button type="submit" class="btn btn-primary">Save Settings</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>