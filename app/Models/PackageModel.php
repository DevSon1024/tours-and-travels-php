<?php namespace App\Models;

use CodeIgniter\Model;

class PackageModel extends Model
{
    protected $table = 'packages';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'destination', 'duration', 'price_per_person', 'discount', 'category',
        'description', 'itinerary', 'inclusions', 'exclusions',
        'hotel_details', 'transport_details', 'image', 'image_urls',
        'start_date', 'end_date', 'status'
    ];
}