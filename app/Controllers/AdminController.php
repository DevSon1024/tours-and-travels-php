<?php namespace App\Controllers;

use App\Models\PackageModel;
use App\Models\UserModel;

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
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
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
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
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
}