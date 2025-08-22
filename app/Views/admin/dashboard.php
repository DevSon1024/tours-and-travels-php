<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<h1>Admin Dashboard</h1>
<div class="row">
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
    // JavaScript to show the toast on page load
    document.addEventListener('DOMContentLoaded', function() {
        var toastEl = document.getElementById('newBookingToast');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    });
</script>
<?= $this->endSection() ?>