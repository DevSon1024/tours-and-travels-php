<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="hero-section rounded" style="background-image: url('<?= esc($background_url) ?>');">
    <div class="overlay"></div>
    <div class="container text-center text-white">
        <h1 class="display-4 fw-bold animate-fade-in-down">Find Your Next Adventure</h1>
        <p class="lead animate-fade-in-up">Explore the world with our curated travel packages. Unforgettable experiences await.</p>
        <?php if (!session()->get('isLoggedIn')): ?>
        <a href="/register" class="btn btn-primary btn-lg mt-3 animate-fade-in-up">Get Started</a>
        <?php endif; ?>
    </div>
</div>

<div class="container mt-5">
    <h2 class="text-center mb-4">Our Packages</h2>
    <div class="row">
        <?php if (!empty($packages)): ?>
            <?php foreach($packages as $package): ?>
            <div class="col-lg-4 col-md-6 mb-4 package-card">
                <div class="card h-100 shadow-sm">
                    <?php 
                        $images = !empty($package['image_urls']) ? explode(',', $package['image_urls']) : [];
                        $first_image = trim($images[0] ?? 'https://placehold.co/600x400/CCCCCC/FFFFFF?text=Tour');
                    ?>
                    <img src="<?= esc($first_image) ?>" class="card-img-top" alt="<?= esc($package['title']) ?>">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= esc($package['title']) ?></h5>
                        <p class="card-text text-muted"><small><?= esc($package['duration']) ?> | <?= esc($package['destination']) ?></small></p>
                        <p class="card-text flex-grow-1"><?= substr(esc($package['description']), 0, 100) ?>...</p>
                        <p class="card-text h4 text-end text-success"><strong>₹<?= esc($package['price_per_person']) ?></strong></p>
                        <a href="/package/<?= $package['id'] ?>" class="btn btn-primary mt-auto">View Details</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col">
                <p class="text-center">No travel packages available at the moment. Please check back later!</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>