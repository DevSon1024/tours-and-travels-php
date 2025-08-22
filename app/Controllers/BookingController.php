<?php namespace App\Controllers;

use App\Models\PackageModel;
use App\Models\BookingModel;

class BookingController extends BaseController
{
    public function book($packageId)
    {
        $packageModel = new PackageModel();
        $data['package'] = $packageModel->find($packageId);
        return view('booking_form', $data);
    }

    // In the processBooking() method:
    public function processBooking()
    {
        $bookingModel = new BookingModel();
        $data = [
            'user_id'            => session()->get('user_id'),
            'package_id'         => $this->request->getPost('package_id'),
            'tour_date'          => $this->request->getPost('tour_date'), // Add this line
            'num_persons'        => $this->request->getPost('num_persons'),
            'contact_phone'      => $this->request->getPost('contact_phone'),
            'health_discomforts' => $this->request->getPost('health_discomforts'),
            'total_price'        => $this->request->getPost('total_price'),
        ];

        $bookingId = $bookingModel->insert($data);
        return redirect()->to('/booking/payment/' . $bookingId);
    }

    public function payment($bookingId)
    {
        $bookingModel = new BookingModel();
        $data['booking'] = $bookingModel->find($bookingId);
        return view('payment_gateway', $data);
    }

    public function receipt($bookingId)
    {
        $bookingModel = new BookingModel();
        $data['booking'] = $bookingModel
            ->select('bookings.*, users.name as user_name, users.email as user_email, packages.title as package_title')
            ->join('users', 'users.id = bookings.user_id')
            ->join('packages', 'packages.id = bookings.package_id')
            ->find($bookingId);
        return view('booking_receipt', $data);
    }
}