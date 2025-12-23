<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\UserModel; // <-- IMPORTANT

class Auth extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session   = session();
    }

    public function login()
    {
        
        // // 1️⃣ Hash the password (store this in your database)
        // $password = '1234';
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // echo "Hashed Password: " . $hashedPassword;

        // // 2️⃣ Later, verify the password (e.g., on login)
        // $inputPassword = '1234'; // password user enters
        // if (password_verify($inputPassword, $hashedPassword)) {
        //     //echo "Password is correct!";
        // } else {
        // // echo "Invalid password!";
        // }


        if ($this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('contact_list'));
        }
        return view('admin/auth/login');
    }

    public function loginProcess()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Invalid credentials');
        }

        $this->session->set([
            'user_id'    => $user['id'],
            'user_name'  => $user['name'],
            'user_email' => $user['email'],
            'isLoggedIn'  => true
        ]);

        return redirect()->to(base_url('admin/contact_list'));
    }

public function change_password()
{
    if ($this->request->getPost()) {
        
        // 1. Validation Rules
        $rules = [
            'current_password' => 'required',
            'password'         => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Get User Data
        $userId = $this->session->get('user_id');
        $user   = $this->userModel->find($userId);

        // 3. Verify Current Password
        if (!password_verify($this->request->getPost('current_password'), $user['password'])) {
            return redirect()->back()->with('error', 'The current password you entered is incorrect.');
        }

        // 4. Update with New Password
        $newData = [
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        if ($this->userModel->update($userId, $newData)) {
            return redirect()->to(base_url('admin/auth/change_password'))->with('success', 'Password updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Update failed. Please try again.');
        }
    }

    return view('admin/auth/change_password');
}
    public function logout()
    {
        $session = session();   // get session service
        $session->destroy();
        return redirect()->to(base_url('admin/login'));
    }
}
