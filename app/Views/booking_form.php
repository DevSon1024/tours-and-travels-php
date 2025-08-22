<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container">
    <h2>Book Your Trip: <?= esc($package['title']) ?></h2>
    <div class="row">
        <div class="col-md-8">
            <form action="/booking/process" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="package_id" value="<?= $package['id'] ?>">
                <input type="hidden" name="total_price" id="total_price_input" value="<?= $package['price_per_person'] ?>">

                <div class="mb-3">
                    <label for="tour_date" class="form-label">Select Tour Date</label>
                    <input type="date" class="form-control" id="tour_date" name="tour_date" required>
                </div>

                <div class="mb-3">
                    <label for="num_persons" class="form-label">Number of Persons</label>
                    <input type="number" class="form-control" id="num_persons" name="num_persons" value="1" min="1" required>
                </div>
                <div class="mb-3">
                    <label for="contact_phone" class="form-label">Contact Phone</label>
                    <input type="tel" class="form-control" name="contact_phone" required>
                </div>
                <div class="mb-3">
                    <label for="health_discomforts" class="form-label">Any Health Discomforts? (optional)</label>
                    <textarea class="form-control" name="health_discomforts" rows="3"></textarea>
                </div>
                <hr>
                <h3 class="text-end">Total Price: <span id="total_price_display">₹<?= esc($package['price_per_person']) ?></span></h3>
                <button type="submit" class="btn btn-success float-end">Proceed to Payment</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set min and max dates for the date picker
        const datePicker = document.getElementById('tour_date');
        const today = new Date().toISOString().split('T')[0];

        const packageStartDate = '<?= $package['start_date'] ?>';
        const packageEndDate = '<?= $package['end_date'] ?>';

        datePicker.min = packageStartDate > today ? packageStartDate : today;
        if (packageEndDate) {
            datePicker.max = packageEndDate;
        }

        // Update price on person change
        document.getElementById('num_persons').addEventListener('input', function() {
            let persons = this.value;
            let pricePerPerson = <?= $package['price_per_person'] ?>;
            let totalPrice = persons * pricePerPerson;
            document.getElementById('total_price_display').innerText = '₹' + totalPrice.toFixed(2);
            document.getElementById('total_price_input').value = totalPrice.toFixed(2);
        });
    });
</script>
<?= $this->endSection() ?>