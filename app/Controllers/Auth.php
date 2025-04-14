<?php

namespace App\Controllers;
use App\Models\User_model;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // Cek jika sudah login
        if (session()->get('logged_in')) {
            return redirect()->to('/page');
        }

        return view('auth/login');
    }

    public function login_action()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password')); // Hindari MD5 untuk real project

        $user = $model->getUserByUsername($username);

        if ($user && $user['password'] === $password) {
            $session->set([
                'username' => $user['username'],
                'logged_in' => true
            ]);
            return redirect()->to('/page');
        } else {
            $session->setFlashdata('error', 'Username atau Password salah!');
            return redirect()->to('/auth/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function register_action()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new User_model();

        if ($userModel->get_user($username)) {
            session()->setFlashdata('error', 'Username sudah terdaftar!');
            return redirect()->to('/auth/register');
        }

        $userModel->save([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        session()->setFlashdata('success', 'Registrasi berhasil. Silakan login.');
        return redirect()->to('/auth/login');
    }
}
