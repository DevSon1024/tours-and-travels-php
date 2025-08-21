<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<div class="hero-section rounded" style="background-image: url('<?= esc($background_url) ?>');">
    <div class="container">
        <h1 class="display-4 fw-bold">Find Your Next Adventure</h1>
        <p class="lead">Explore the world with our curated travel packages. Unforgettable experiences await.</p>
        <?php if (!session()->get('isLoggedIn')): ?>
        <a href="/register" class="btn btn-primary btn-lg mt-3">Get Started</a>
        <?php endif; ?>
    </div>
</div>

<div class="container">
    <!-- Packages Section -->
    <h2 class="text-center mb-4 mt-5">Our Packages</h2>
    <div class="row">
        <?php if (!empty($packages)): ?>
            <?php foreach($packages as $package): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= esc($package['title']) ?></h5>
                        <p class="card-text flex-grow-1"><?= esc($package['description']) ?></p>
                        <p class="card-text h4 text-end text-success"><strong>$<?= esc($package['price']) ?></strong></p>
                        <?php if (session()->get('isLoggedIn')): ?>
                            <a href="/dashboard" class="btn btn-primary mt-auto">Book Now</a>
                            <a href="/package/<?= $package['id'] ?>" class="btn btn-primary mt-auto">View Details</a>
                        <?php else: ?>
                            <a href="/login" class="btn btn-primary mt-auto">Login to Book</a>
                        <?php endif; ?>
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