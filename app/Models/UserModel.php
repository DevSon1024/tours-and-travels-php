<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'role'];

    public function getUsersWithBookings()
    {
        return $this->select('users.*, GROUP_CONCAT(packages.title SEPARATOR ", ") as booked_packages')
                    ->join('bookings', 'bookings.user_id = users.id', 'left')
                    ->join('packages', 'packages.id = bookings.package_id', 'left')
                    ->where('users.role', 'customer')
                    ->groupBy('users.id')
                    ->findAll();
    }
}