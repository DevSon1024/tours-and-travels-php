<?php namespace App\Models;

use CodeIgniter\Model;

class PackageModel extends Model
{
    protected $table = 'packages';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'destination', 'duration', 'price_per_person', 'discount', 'category', 'tags',
        'description', 'itinerary', 'inclusions', 'exclusions',
        'hotel_details', 'transport_details', 'image', 'image_urls',
        'start_date', 'end_date', 'status'
    ];

    public function getFilteredPackages($filters = [])
    {
        $builder = $this->where('status', 'Active');

        // Keyword search for destination or tags
        if (!empty($filters['search'])) {
            $builder->groupStart();
            $builder->like('destination', $filters['search']);
            $builder->orLike('title', $filters['search']);
            $builder->orLike('category', $filters['search']);
            $builder->orLike('tags', $filters['search']);
            $builder->groupEnd();
        }

        if (!empty($filters['destination'])) {
            $builder->like('destination', $filters['destination']);
        }

        if (!empty($filters['start_date']) && !empty($filters['end_date'])) {
            $builder->groupStart();
            $builder->where('start_date <=', $filters['end_date']);
            $builder->where('end_date >=', $filters['start_date']);
            $builder->groupEnd();
        } elseif (!empty($filters['start_date'])) {
            $builder->where('start_date <=', $filters['start_date']);
            $builder->where('end_date >=', $filters['start_date']);
        }


        if (!empty($filters['max_price'])) {
            $builder->where('price_per_person <=', $filters['max_price']);
        }

        return $builder->findAll();
    }
}