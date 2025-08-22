<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<h2>All Bookings</h2>

<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">Filter & Sort</h5>
        <form action="/admin/bookings" method="get">
            <div class="row">
                <div class="col-md-3">
                    <label>From Date</label>
                        <input type="date" name="filter_start_date"  class="form-control" value="<?= esc($filters['start_date']) ?>">
                    </div>
                    <div class="col-md-3">
                        <label>To Date</label>
                        <input type="date" name="filter_end_date" class="form-control" value="<?= esc($filters['end_date']) ?>">
                    </div>
                <div class="col-md-3">
                    <label>By Package</label>
                    <select name="filter_package" class="form-select">
                        <option value="">All Packages</option>
                        <?php foreach($packages as $package): ?>
                            <option value="<?= $package['id'] ?>" <?= ($filters['package_id'] == $package['id']) ? 'selected' : '' ?>>
                                <?= esc($package['title']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>By Destination</label>
                    <input type="text" name="filter_destination" class="form-control" value="<?= esc($filters['destination']) ?>" placeholder="Enter destination">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">Apply</button>
                    <a href="/admin/bookings" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Booking ID</th>
            <th>Customer Name</th>
            <th>Package</th>
            <th><a href="?sort_by=total_price&sort_order=<?= $sorting['sortOrder'] === 'ASC' ? 'DESC' : 'ASC' ?>">Total Price</a></th>
            <th>Status</th>
            <th><a href="?sort_by=tour_date&sort_order=<?= $sorting['sortOrder'] === 'ASC' ? 'DESC' : 'ASC' ?>">Booking Date</a></th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($bookings)): ?>
            <?php foreach($bookings as $booking): ?>
            <tr>
                <td><?= $booking['id'] ?></td>
                <td><?= esc($booking['user_name']) ?></td>
                <td><?= esc($booking['package_title']) ?></td>
                <td>₹<?= esc($booking['total_price']) ?></td>
                <td><span class="badge bg-success"><?= esc($booking['status']) ?></span></td>
                <td><?= date('d M, Y', strtotime($booking['tour_date'])) ?></td>
                <td>
                    <a href="/admin/bookings/details/<?= $booking['id'] ?>" class="btn btn-sm btn-info">View Details</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">No bookings found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?= $this->endSection() ?>