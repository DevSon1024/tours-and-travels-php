<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<h2>Add New Package</h2>
<form action="/admin/packages/store" method="post">
    <?= csrf_field() ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Package Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Itinerary (Day-wise Plan)</label>
                        <textarea class="form-control" name="itinerary" rows="5"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Inclusions</label>
                            <textarea class="form-control" name="inclusions" rows="4" placeholder="e.g., Hotel, Meals, Cab"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Exclusions</label>
                            <textarea class="form-control" name="exclusions" rows="4" placeholder="e.g., Personal expenses"></textarea>
                        </div>
                    </div>
                     <div class="mb-3">
                        <label class="form-label">Image URLs (comma-separated)</label>
                        <textarea class="form-control" name="image_urls" rows="2"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Destination</label>
                        <input type="text" class="form-control" name="destination">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Duration</label>
                        <input type="text" class="form-control" name="duration" placeholder="e.g., 5 Days / 4 Nights">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" placeholder="e.g., Honeymoon, Adventure">
                    </div>
                     <div class="mb-3">
                        <label class="form-label">Price per Person (₹)</label>
                        <input type="number" step="0.01" class="form-control" name="price_per_person" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Discount (%)</label>
                        <input type="number" class="form-control" name="discount" value="0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Save Package</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection() ?>