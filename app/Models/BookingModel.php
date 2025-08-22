<?php namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 'package_id', 'num_persons', 'contact_phone',
        'health_discomforts', 'total_price', 'status'
    ];

    public function getBookingsByUser($userId)
    {
        return $this->select('bookings.*, packages.title, packages.image_urls')
                    ->join('packages', 'packages.id = bookings.package_id')
                    ->where('bookings.user_id', $userId)
                    ->findAll();
    }

   public function getNewBookingsCount()
    {
        return $this->where('DATE(created_at)', date('Y-m-d'))->countAllResults();
    }

    public function getAllBookings($filters = [], $sorting = [])
    {
        $builder = $this->select('bookings.*, users.name as user_name, packages.title as package_title, packages.destination')
                        ->join('users', 'users.id = bookings.user_id')
                        ->join('packages', 'packages.id = bookings.package_id');

        // --- DATE RANGE FILTER (UPDATED) ---
        if (!empty($filters['start_date']) && !empty($filters['end_date'])) {
            $builder->where('bookings.tour_date >=', $filters['start_date']);
            $builder->where('bookings.tour_date <=', $filters['end_date']);
        }
        // --- END OF UPDATE ---

        if (!empty($filters['package_id'])) {
            $builder->where('bookings.package_id', $filters['package_id']);
        }
        if (!empty($filters['destination'])) {
            $builder->like('packages.destination', $filters['destination']);
        }

        $sortBy = $sorting['sortBy'] ?? 'bookings.id';
        $sortOrder = $sorting['sortOrder'] ?? 'DESC';
        $builder->orderBy($sortBy, $sortOrder);

        return $builder->findAll();
    }
}