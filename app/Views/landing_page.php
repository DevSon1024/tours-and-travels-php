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

<div class="search-bar container bg-light p-4 rounded shadow-sm">
    <form action="/" method="get">
        <div class="row g-3 align-items-end">
            <div class="col-lg-3 col-md-6">
                <label for="destination" class="form-label">Destination</label>
                <input type="text" class="form-control" name="destination" placeholder="e.g., Goa, Manali" value="<?= esc($filters['destination']) ?>">
            </div>
            <div class="col-lg-3 col-md-6">
                <label for="start_date" class="form-label">Available From</label>
                <input type="date" class="form-control" name="start_date" value="<?= esc($filters['start_date']) ?>">
            </div>
             <div class="col-lg-3 col-md-6">
                <label for="end_date" class="form-label">Available To</label>
                <input type="date" class="form-control" name="end_date" value="<?= esc($filters['end_date']) ?>">
            </div>
            <div class="col-lg-2 col-md-6">
                <label for="max_price" class="form-label">Max Price (₹)</label>
                <input type="number" class="form-control" name="max_price" placeholder="e.g., 50000" value="<?= esc($filters['max_price']) ?>">
            </div>
            <div class="col-lg-1 col-md-12 d-grid">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
</div>

<div class="container mt-5">
    <h2 class="text-center mb-4">Our Packages</h2>
    <div class="row">
        <?php if (!empty($packages)): ?>
            <?php foreach($packages as $package): ?>
            <div class="col-lg-4 col-md-6 mb-4 package-card">
                <div class="card h-100 shadow-sm">
                    <div class="position-relative">
                        <?php
                            $images = !empty($package['image_urls']) ? explode(',', $package['image_urls']) : [];
                            $first_image = trim($images[0] ?? 'https://placehold.co/600x400/CCCCCC/FFFFFF?text=Tour');
                        ?>
                        <img src="<?= esc($first_image) ?>" class="card-img-top" alt="<?= esc($package['title']) ?>">

                        <span class="badge bg-<?= $package['status'] == 'Active' ? 'success' : 'secondary' ?> position-absolute top-0 end-0 m-2">
                            <?= esc($package['status']) ?>
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= esc($package['title']) ?></h5>
                        <p class="card-text text-muted"><small><?= esc($package['duration']) ?> | <?= esc($package['destination']) ?></small></p>
                        <p class="card-text text-info">
                            <small><b>Available:</b> <?= date('d M, Y', strtotime($package['start_date'])) ?> to <?= date('d M, Y', strtotime($package['end_date'])) ?></small>
                        </p>
                        <p class="card-text flex-grow-1"><?= substr(esc($package['description']), 0, 100) ?>...</p>
                        <p class="card-text h4 text-end text-success"><strong>₹<?= esc($package['price_per_person']) ?></strong></p>
                        <a href="/package/<?= $package['id'] ?>" class="btn btn-primary mt-auto">View Details</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col">
                <p class="text-center">No travel packages found matching your criteria. Please try different filters!</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>