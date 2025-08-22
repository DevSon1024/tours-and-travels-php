<?php namespace App\Controllers;

use App\Models\BookingModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $bookingModel = new BookingModel();
        $data['bookings'] = $bookingModel->getBookingsByUser(session()->get('user_id'));
        return view('dashboard', $data);
    }
}