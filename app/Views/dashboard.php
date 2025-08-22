<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container">
    <h1>My Booked Tours</h1>
    <div class="row">
        <?php if (!empty($bookings)): ?>
            <?php foreach($bookings as $booking): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                     <?php 
                        $images = !empty($booking['image_urls']) ? explode(',', $booking['image_urls']) : [];
                        $first_image = trim($images[0] ?? 'https://placehold.co/600x400/CCCCCC/FFFFFF?text=Tour');
                    ?>
                    <img src="<?= esc($first_image) ?>" class="card-img-top" alt="<?= esc($booking['title']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($booking['title']) ?></h5>
                        <p><strong>Booking ID:</strong> <?= $booking['id'] ?></p>
                        <a href="/booking/receipt/<?= $booking['id'] ?>" class="btn btn-info">View Receipt</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>You have not booked any tours yet.</p>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>