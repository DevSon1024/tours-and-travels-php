<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<div class="container package-details mt-5">

    <div class="row">
        <div class="col-lg-8">
            <h1 class="display-5 fw-bold"><?= esc($package['title']) ?></h1>
            <p class="lead text-muted"><?= esc($package['destination']) ?> | <?= esc($package['category']) ?></p>
        </div>
        <div class="col-lg-4 text-lg-end">
            <p class="h2 text-success"><strong>₹<?= esc($package['price_per_person']) ?></strong> <span class="h5 text-muted">/ person</span></p>
            <p class="text-info"><b>Available:</b> <?= date('d M Y', strtotime($package['start_date'])) ?> to <?= date('d M Y', strtotime($package['end_date'])) ?></p>
        </div>
    </div>
    <hr>

    <?php if (!empty($images)): ?>
    <div id="packageCarousel" class="carousel slide shadow-lg rounded mb-4" data-bs-ride="carousel">
        <div class="carousel-inner rounded">
            <?php foreach($images as $key => $image_url): ?>
            <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                <img src="<?= esc(trim($image_url)) ?>" class="d-block w-100" style="height: 500px; object-fit: cover;" alt="Package Image">
            </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#packageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#packageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tour Details</h4>
                    <p><?= esc($package['description']) ?></p>
                    <hr>
                    <h4>Itinerary</h4>
                    <p><?= nl2br(esc($package['itinerary'])) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title">Admin Action</h4>
                    <p>This is a preview of the user-facing page.</p>
                    <div class="d-grid gap-2">
                        <a href="/admin/dashboard" class="btn btn-secondary">Return to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>