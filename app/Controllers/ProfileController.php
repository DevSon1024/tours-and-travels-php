<?php namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find(session()->get('user_id'));

        if (session()->get('role') === 'admin') {
            return view('admin/profile', $data);
        }
        return view('profile', $data);
    }

    public function edit()
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find(session()->get('user_id'));
        return view('edit_profile', $data);
    }

    public function update()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');

        $data = [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        $userModel->update($userId, $data);
        return redirect()->to('/profile')->with('success', 'Profile updated successfully.');
    }

    public function delete()
    {
        $userModel = new UserModel();
        $userModel->delete(session()->get('user_id'));
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Your account has been deleted.');
    }
}