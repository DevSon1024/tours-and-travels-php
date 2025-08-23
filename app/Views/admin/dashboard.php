<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<h1>Admin Dashboard</h1>

<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Packages</h5>
                <p class="card-text fs-4"><?= $total_packages ?></p>
                <a href="/admin/packages" class="btn btn-light btn-sm">View All</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Customers</h5>
                <p class="card-text fs-4"><?= $total_customers ?></p>
                <a href="/admin/users" class="btn btn-light btn-sm">View All</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Bookings</h5>
                <p class="card-text fs-4"><?= $total_bookings ?></p>
                <a href="/admin/bookings" class="btn btn-light btn-sm">View All</a>
            </div>
        </div>
    </div>
</div>

<hr class="my-4">
<h2 class="mb-3">Package Preview</h2>
<div class="row">
    <?php if (!empty($packages)): ?>
        <?php foreach($packages as $package): ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="position-relative">
                    <?php
                        $images = !empty($package['image_urls']) ? explode(',', $package['image_urls']) : [];
                        $first_image = trim($images[0] ?? 'https://placehold.co/600x400/CCCCCC/FFFFFF?text=Tour');
                    ?>
                    <img src="<?= esc($first_image) ?>" class="card-img-top" alt="<?= esc($package['title']) ?>">

                    <span class="badge bg-<?= $package['status'] == 'Active' ? 'success' : 'secondary' ?> position-absolute top-0 end-0 m-2">
                        <?= esc($package['status']) ?>
                    </span>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= esc($package['title']) ?></h5>
                    <p class="card-text text-muted"><small><?= esc($package['duration']) ?></small></p>
                    <a href="/admin/packages/preview/<?= $package['id'] ?>" class="btn btn-secondary btn-sm">Preview Details</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No packages created yet.</p>
    <?php endif; ?>
</div>


<?php if ($new_bookings_count > 0): ?>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="newBookingToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">New Notification</strong>
            <small>Just now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            You have <?= $new_bookings_count ?> new booking(s) today!
            <div class="mt-2 pt-2 border-top">
                <a href="/admin/bookings" class="btn btn-primary btn-sm">View Bookings</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toastEl = document.getElementById('newBookingToast');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    });
</script>
<?= $this->endSection() ?>