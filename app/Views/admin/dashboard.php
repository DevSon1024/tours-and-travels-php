<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<h1>Admin Dashboard</h1>
<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Packages <a href="/admin/packages/create" class="text-white">+</a></h5>
                <p class="card-text fs-4"><?= $total_packages ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Customers</h5>
                <p class="card-text fs-4"><?= $total_customers ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Bookings</h5>
                <p class="card-text fs-4"><?= $total_bookings ?></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>