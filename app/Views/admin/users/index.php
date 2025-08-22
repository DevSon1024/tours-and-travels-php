<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<h2>Manage Users</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Booked Packages</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= esc($user['name']) ?></td>
            <td><?= esc($user['email']) ?></td>
            <td><?= esc($user['booked_packages']) ?: 'No bookings yet' ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>