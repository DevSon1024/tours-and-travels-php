<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container text-center">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-header">
            <h4>Dummy Payment Gateway</h4>
        </div>
        <div class="card-body">
            <p>This is a simulated payment page.</p>
            <p><strong>Amount to Pay:</strong> ₹<?= esc($booking['total_price']) ?></p>
            <a href="/booking/receipt/<?= $booking['id'] ?>" class="btn btn-primary">Simulate Successful Payment</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>