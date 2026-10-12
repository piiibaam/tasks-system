<?php
namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        helper(['form']);

        if (session()->get('logged_in')) {
            return redirect()->to('/tasks');
        }

        if ($this->request->getMethod() === 'POST') {
            $username = trim((string) $this->request->getPost('username'));
            $password = (string) $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->where('username', $username)->first();

            if ($user && !empty($user['password'])
                && password_verify($password, $user['password'])) {

                session()->regenerate();

                session()->set([
                    'user_id'   => $user['id'],
                    'username'  => $user['username'],
                    'full_name' => $user['full_name'],
                    'logged_in' => true,
                ]);

                return redirect()->to('/tasks');
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid username or password.');
        }

        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login')
            ->with('message', 'You have been logged out.');
    }
}