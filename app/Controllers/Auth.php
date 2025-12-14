<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        return view('auth/login', [
            'title' => 'Login Admin',
            'validation' => \Config\Services::validation()
        ]);
    }

    public function attemptLogin()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Hardcoded credentials as requested
        // Username: andi123
        // Password: andi456
        if ($username === 'andi123' && $password === 'andi456') {
            $sessionData = [
                'username'   => $username,
                'isLoggedIn' => true
            ];
            session()->set($sessionData);
            return redirect()->to('/admin');
        } else {
            session()->setFlashdata('message', 'Username atau Password salah.');
            return redirect()->to('/login')->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
