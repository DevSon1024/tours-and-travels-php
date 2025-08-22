<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<h2>Booking Details #<?= $booking['id'] ?></h2>
<div class="card">
    <div class="card-body">
        <p><strong>Package:</strong> <?= esc($booking['package_title']) ?></p>
        <p><strong>Customer:</strong> <?= esc($booking['user_name']) ?> (<?= esc($booking['user_email']) ?>)</p>
        <p><strong>Contact Phone:</strong> <?= esc($booking['contact_phone']) ?></p>
        <p><strong>Number of Persons:</strong> <?= esc($booking['num_persons']) ?></p>
        <p><strong>Health Info:</strong> <?= esc($booking['health_discomforts']) ?></p>
        <p><strong>Total Price:</strong> ₹<?= esc($booking['total_price']) ?></p>
        <p><strong>Status:</strong> <?= esc($booking['status']) ?></p>
    </div>
</div>
<?= $this->endSection() ?>