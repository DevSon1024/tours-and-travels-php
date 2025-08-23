<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>

<div class="container package-details mt-5">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="display-5 fw-bold mb-3"><?= esc($package['title']) ?></h1>

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
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#packageCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="packageTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">Overview</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="itinerary-tab" data-bs-toggle="tab" data-bs-target="#itinerary" type="button" role="tab">Itinerary</button>
                        </li>
                         <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab">Details</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body tab-content" id="packageTabContent">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel">
                        <h4 class="card-title">Tour Description</h4>
                        <p><?= esc($package['description']) ?></p>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Inclusions</h4>
                                <?= nl2ul($package['inclusions']) ?>
                            </div>
                            <div class="col-md-6">
                                <h4>Exclusions</h4>
                                <?= nl2ul($package['exclusions']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="itinerary" role="tabpanel">
                        <h4>Itinerary</h4>
                        <p><?= nl2br(esc($package['itinerary'])) ?></p>
                    </div>
                     <div class="tab-pane fade" id="details" role="tabpanel">
                        <h4>Hotel & Transport</h4>
                        <p><strong>Hotel:</strong> <?= nl2br(esc($package['hotel_details'])) ?></p>
                        <p><strong>Transport:</strong> <?= nl2br(esc($package['transport_details'])) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card sticky-sidebar">
                <div class="card-body">
                     <?php if (!empty($package['discount']) && $package['discount'] > 0): ?>
                        <h4 class="text-danger"><span class="badge bg-danger special-offer">Special Offer: <?= esc($package['discount']) ?>% OFF</span></h4>
                    <?php endif; ?>
                    <p class="h2 text-success"><strong>₹<?= esc($package['price_per_person']) ?></strong> <span class="h5 text-muted">/ person</span></p>
                    <hr>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-geo-alt-fill text-primary"></i> <strong>Destination:</strong> <?= esc($package['destination']) ?></li>
                        <li class="mb-2"><i class="bi bi-clock-fill text-primary"></i> <strong>Duration:</strong> <?= esc($package['duration']) ?></li>
                        <li class="mb-2"><i class="bi bi-tag-fill text-primary"></i> <strong>Category:</strong> <?= esc($package['category']) ?></li>
                         <li class="mb-2"><i class="bi bi-calendar-check-fill text-primary"></i> <strong>Available:</strong> <?= date('d M Y', strtotime($package['start_date'])) ?> to <?= date('d M Y', strtotime($package['end_date'])) ?></li>
                    </ul>
                    <hr>
                    <h4 class="card-title">Admin Actions</h4>
                    <div class="d-grid gap-2">
                        <a href="/admin/packages/edit/<?= $package['id'] ?>" class="btn btn-warning">Edit Package</a>
                        <a href="/admin/dashboard" class="btn btn-secondary">Return to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container package-details-content mt-5">
        <div class="row mt-4">
            <div class="col-lg-8">
                <div class="card content-card mt-4">
                    <div class="card-body">
                    <h4><i class="bi bi-tags-fill"></i> Tags</h4>
                    <?= display_tags($package['tags']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>