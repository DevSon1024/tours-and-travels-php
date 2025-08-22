<?php namespace App\Controllers;

use App\Models\PackageModel;
use App\Models\SettingModel;

class HomeController extends BaseController
{
    public function index()
    {
        $packageModel = new PackageModel();
        $settingModel = new SettingModel();

        $filters = [
            'destination' => $this->request->getGet('destination'),
            'start_date'  => $this->request->getGet('start_date'),
            'end_date'    => $this->request->getGet('end_date'),
            'max_price'   => $this->request->getGet('max_price')
        ];

        $data['packages'] = $packageModel->where('status', 'Active')->findAll();
        $data ['filters'] = $filters; // Send filters back to the view


        $background = $settingModel->where('setting_key', 'landing_page_background')->first();
        $data['background_url'] = $background ? $background['setting_value'] : 'https://i.ibb.co/LD7gXmCm/anders-jilden-c-Yr-MQA7a3-Wc-unsplash.jpg';

        return view('landing_page', $data);
    }
    public function packageDetails($id)
    {
        $packageModel = new PackageModel();
        $data['package'] = $packageModel->find($id);

        if (empty($data['package'])) {
            // Handle case where package is not found
            return redirect()->to('/')->with('error', 'Package not found.');
        }

        // Convert comma-separated image URLs to an array
        $data['images'] = !empty($data['package']['image_urls']) ? explode(',', $data['package']['image_urls']) : [];

        return view('package_details', $data);
    }
}