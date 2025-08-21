<?php namespace App\Controllers;

use App\Models\PackageModel;
use App\Models\UserModel;
use App\Models\SettingModel;

class AdminController extends BaseController
{
    public function index()
    {
        $packageModel = new PackageModel();
        $userModel = new UserModel();

        $data = [
            'total_packages' => $packageModel->countAllResults(),
            'total_customers' => $userModel->where('role', 'customer')->countAllResults(),
            'total_bookings'  => 0 // We will implement this later
        ];

        return view('admin/dashboard', $data);
    }

    // --- Package Management ---

    public function packages()
    {
        $packageModel = new PackageModel();
        $data['packages'] = $packageModel->findAll();
        return view('admin/packages/index', $data);
    }

    public function createPackage()
    {
        return view('admin/packages/create');
    }

    public function storePackage()
    {
        $packageModel = new PackageModel();

        $data = [
            'title'             => $this->request->getPost('title'),
            'destination'       => $this->request->getPost('destination'),
            'duration'          => $this->request->getPost('duration'),
            // --- THIS IS THE FIX ---
            'price_per_person'  => $this->request->getPost('price_per_person'), 
            // --- END OF FIX ---
            'discount'          => $this->request->getPost('discount'),
            'category'          => $this->request->getPost('category'),
            'description'       => $this->request->getPost('description'),
            'itinerary'         => $this->request->getPost('itinerary'),
            'inclusions'        => $this->request->getPost('inclusions'),
            'exclusions'        => $this->request->getPost('exclusions'),
            'hotel_details'     => $this->request->getPost('hotel_details'),
            'transport_details' => $this->request->getPost('transport_details'),
            'image_urls'        => $this->request->getPost('image_urls'),
            'start_date'        => $this->request->getPost('start_date'),
            'end_date'          => $this->request->getPost('end_date'),
            'status'            => $this->request->getPost('status'),
        ];

        $packageModel->save($data);
        return redirect()->to('/admin/packages')->with('success', 'Package added successfully.');
    }


   public function editPackage($id)
    {
        $packageModel = new PackageModel();
        $data['package'] = $packageModel->find($id);
        return view('admin/packages/edit', $data);
    }

    public function updatePackage($id)
    {
        $packageModel = new PackageModel();
        $data = [
             'title'             => $this->request->getPost('title'),
            'destination'       => $this->request->getPost('destination'),
            'duration'          => $this->request->getPost('duration'),
            'price_per_person'  => $this->request->getPost('price_per_person'),
            'discount'          => $this->request->getPost('discount'),
            'category'          => $this->request->getPost('category'),
            'description'       => $this->request->getPost('description'),
            'itinerary'         => $this->request->getPost('itinerary'),
            'inclusions'        => $this->request->getPost('inclusions'),
            'exclusions'        => $this->request->getPost('exclusions'),
            'hotel_details'     => $this->request->getPost('hotel_details'),
            'transport_details' => $this->request->getPost('transport_details'),
            'image_urls'        => $this->request->getPost('image_urls'),
            'start_date'        => $this->request->getPost('start_date'),
            'end_date'          => $this->request->getPost('end_date'),
            'status'            => $this->request->getPost('status'),
        ];
        $packageModel->update($id, $data);
        return redirect()->to('/admin/packages')->with('success', 'Package updated successfully.');
    }

    public function deletePackage($id)
    {
        $packageModel = new PackageModel();
        $packageModel->delete($id);
        return redirect()->to('/admin/packages')->with('success', 'Package deleted successfully.');
    }

    public function settings()
    {
        $settingModel = new SettingModel();
        $data['background'] = $settingModel->where('setting_key', 'landing_page_background')->first();
        return view('admin/settings', $data);
    }

    public function updateSettings()
    {
        $settingModel = new SettingModel();
        $setting = $settingModel->where('setting_key', 'landing_page_background')->first();

        $data = [
            'setting_value' => $this->request->getPost('background_url')
        ];

        $settingModel->update($setting['id'], $data);
        return redirect()->to('/admin/settings')->with('success', 'Settings updated successfully.');
    }
}