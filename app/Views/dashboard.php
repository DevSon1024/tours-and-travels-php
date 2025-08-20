<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container">
    <h1>Welcome, <?= session()->get('name') ?>!</h1>
    <p>Explore our amazing travel packages.</p>

    <div class="row">
        <?php if (!empty($packages)): ?>
            <?php foreach($packages as $package): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($package['title']) ?></h5>
                        <p class="card-text"><?= esc($package['description']) ?></p>
                        <p class="card-text"><strong>Price:</strong> ₹<?= esc($package['price']) ?></p>
                        <a href="#" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No travel packages available at the moment.</p>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>