<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Booking Confirmed!</h3>
        </div>
        <div class="card-body">
            <h4>Receipt</h4>
            <p><strong>Booking ID:</strong> <?= esc($booking['id']) ?></p>
            <p><strong>Package:</strong> <?= esc($booking['package_title']) ?></p>
            <p><strong>Name:</strong> <?= esc($booking['user_name']) ?></p>
            <p><strong>Email:</strong> <?= esc($booking['user_email']) ?></p>
            <p><strong>Total Paid:</strong> ₹<?= esc($booking['total_price']) ?></p>
            <hr>
            <button class="btn btn-secondary" onclick="window.print()">Print Receipt</button>
        </div>
    </div>
</div>
<?= $this->endSection() ?>