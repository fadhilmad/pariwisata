<?php

namespace App\Controllers;

use App\Models\UserBiasaModel;

class UserLogin extends BaseController
{

    function __construct()
    {
        $this->UserBiasaModel = new UserBiasaModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data['title'] = 'Login User';
        return view('main/login', $data);
    }

    public function login_user_validasi()
    {
        $email  = $this->request->getPost('email');
        $password  = $this->request->getPost('password');
        $dataUser = $this->UserBiasaModel->where([
            'email' => $email,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'id_user' => $dataUser['id_user'],
                    'email' => $dataUser['email'],
                    'nama' => $dataUser['nama'],
                    'logged_in' => TRUE,
                    'status' => 'user'
                ]);
                $flash = ['message' => 'Login Berhasil, Selamat Datang ' . $dataUser['nama'], 'jenis' => 'success'];
                $this->session->setFlashdata('flash', $flash);
                return redirect()->to(base_url(''));
            } else {
                $flash = ['message' => 'Password Salah, Silahkan login lagi!!!', 'jenis' => 'danger'];
                $this->session->setFlashdata('flash', $flash);
                return redirect()->back();
            }
        } else {
            $flash = ['message' => 'email tidak ditemukan!!!', 'jenis' => 'danger'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->back();
        }
    }

    public function simpan_registrasi()
    {
        $nama  = $this->request->getPost('nama');
        $email  = $this->request->getPost('email');
        $password  = $this->request->getPost('password');
        $cek = $this->UserBiasaModel->where([
            'email' => $email
        ])->first();
        if ($cek == null) {
            $data = [
                'email' => $email,
                'nama' => $nama,
                'password' =>  password_hash($password, PASSWORD_DEFAULT)
            ];
            $this->UserBiasaModel->insert($data);
            $flash = ['message' => 'Registrasi Berhasil, silahkan login', 'jenis' => 'success'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('login_user'));
        } else {
            $flash = ['message' => 'Registrasi Gagal, Email sudah terdaftar', 'jenis' => 'danger'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('login_user'));
        }
    }
    function logout()
    {
        session()->destroy();
        $flash = ['message' => 'Logout berhasil', 'jenis' => 'success'];
        $this->session->setFlashdata('flash', $flash);
        return redirect()->to(base_url('login_user'));
    }
}
