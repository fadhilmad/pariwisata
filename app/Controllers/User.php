<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{

    function __construct()
    {
        $this->user = new UserModel();
        $this->session = \Config\Services::session();
    }

    function login()
    {
        if (!empty($this->session->get('nama'))) {
            return redirect()->to(base_url('home'));
        }
        return view('admin/login');
    }
    function process()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $this->user->where([
            'username' => $username,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'username' => $dataUser['username'],
                    'nama' => $dataUser['nama'],
                    'logged_in' => TRUE,
                    'status' => 'admin'
                ]);
                $flash = ['message' => 'Login Berhasil, Selamat Datang ' . $dataUser['nama'], 'jenis' => 'success', 'icon' => ''];
                $this->session->setFlashdata('flash', $flash);
                return redirect()->to(base_url('home'));
            } else {
                $flash = ['message' => 'Password Salah, Silahkan login lagi', 'jenis' => 'danger'];
                $this->session->setFlashdata('flash', $flash);
                return redirect()->back();
            }
        } else {
            $flash = ['message' => 'Username atau Password Salah', 'jenis' => 'danger'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->back();
        }
    }
    function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
