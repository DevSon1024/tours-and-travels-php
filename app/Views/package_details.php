<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container package-details">
    <h1 class="mb-4"><?= esc($package['title']) ?></h1>

    <?php if (!empty($images)): ?>
    <div id="packageCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach($images as $key => $image_url): ?>
            <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                <img src="<?= esc(trim($image_url)) ?>" class="d-block w-100" alt="Package Image">
            </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#packageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#packageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <h3><?= esc($package['description']) ?></h3>
            <hr>
            <h4>Itinerary</h4>
            <p><?= nl2br(esc($package['itinerary'])) ?></p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>