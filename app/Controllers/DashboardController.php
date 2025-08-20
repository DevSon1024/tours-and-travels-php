<?php namespace App\Controllers;

use App\Models\PackageModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $packageModel = new PackageModel();
        $data['packages'] = $packageModel->findAll();
        return view('dashboard', $data);
    }
}