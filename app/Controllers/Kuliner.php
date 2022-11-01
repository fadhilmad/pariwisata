<?php

namespace App\Controllers;

use App\Models\KulinerModel;

class Kuliner extends BaseController
{
    public function __construct()
    {
        $this->KulinerModel = new KulinerModel();
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $data['title'] = 'Kuliner';
        $data['sub_title'] = 'Data Kuliner';
        $data['kuliner'] =  $this->KulinerModel->get_kuliner();
        return view('admin/kuliner/list', $data);
    }

    public function tambah_kuliner()
    {
        $this->validation->setRules([
            'nama_kuliner' => 'required',
            'deskripsi_kuliner' => 'required',
            'gambar_kuliner' => 'uploaded[gambar_kuliner]|mime_in[gambar_kuliner,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_kuliner,10280]',

        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $upload = $this->request->getFile('gambar_kuliner');
            $nama_gambar =  $upload->getRandomName();
            $upload->move(WRITEPATH . '../public/kuliner/', $nama_gambar);
            $this->KulinerModel->insert(
                [
                    "nama_kuliner" => $this->request->getPost('nama_kuliner'),
                    "deskripsi_kuliner" => $this->request->getPost('deskripsi_kuliner'),
                    "slug" => url_title($this->request->getPost('nama_kuliner'), '-', true),
                    'gambar_kuliner' => $nama_gambar
                ]
            );
            $flash = ['message' => 'Data kuliner Berhasil Ditambahkan', 'jenis' => 'success', 'icon' => 'fa fa-check'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('data_kuliner'));
        } else {
            $flash = ['message' => 'Data kuliner Gagal Ditambahkan, Lengkapi Form Isian', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('data_kuliner'));
        }
    }
    public function edit_kuliner()
    {
        $this->validation->setRules([
            'nama_kuliner' => 'required',
            'deskripsi_kuliner' => 'required',
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $this->validation->setRules([
                'gambar_kuliner' => 'uploaded[gambar_kuliner]|mime_in[gambar_kuliner,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_kuliner,10280]',
            ]);
            $isGambarValid = $this->validation->withRequest($this->request)->run();
            $id_kuliner = $this->request->getPost('id_kuliner');
            if ($isGambarValid) {
                $PM = $this->KulinerModel->get_kuliner_where(['id_kuliner' => $id_kuliner]);
                $gambar = $PM->gambar_kuliner;
                $path = '../public/kuliner/';
                if (isset($gambar)) {
                    @unlink($path . $gambar);
                    $upload = $this->request->getFile('gambar_kuliner');
                    $nama_gambar =  $upload->getRandomName();
                    $upload->move(WRITEPATH . '../public/kuliner/', $nama_gambar);
                    $this->KulinerModel->update(
                        $id_kuliner,
                        [
                            "nama_kuliner" => $this->request->getPost('nama_kuliner'),
                            "slug" => url_title($this->request->getPost('nama_kuliner'), '-', true),
                            "deskripsi_kuliner" => $this->request->getPost('deskripsi_kuliner'),
                            'gambar_kuliner' => $nama_gambar
                        ]
                    );
                    $flash = ['message' => 'Data kuliner Berhasil Dirubah', 'jenis' => 'success', 'icon' => 'fa fa-check'];
                    $this->session->setFlashdata('flash', $flash);
                    return redirect()->to(base_url('data_kuliner'));
                }
            } else {
                $this->KulinerModel->update(
                    $id_kuliner,
                    [
                        "nama_kuliner" => $this->request->getPost('nama_kuliner'),
                        "deskripsi_kuliner" => $this->request->getPost('deskripsi_kuliner'),
                        "slug" => url_title($this->request->getPost('nama_kuliner'), '-', true),
                    ]
                );
                $flash = ['message' => 'Data kuliner Berhasil Dirubah', 'jenis' => 'success', 'icon' => 'fa fa-check'];
                $this->session->setFlashdata('flash', $flash);
                return redirect()->to(base_url('data_kuliner'));
            }
        } else {
            $flash = ['message' => 'Data kuliner Gagal Dirubah, Lengkapi Form Isian', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('data_kuliner'));
        }
    }
    public function hapus_kuliner($id_kuliner)
    {
        $datakuliner = $this->KulinerModel->getWhere_kuliner(['id_kuliner' => $id_kuliner]);
        $path = '../public/kuliner/';
        @unlink($path . $datakuliner->gambar_pariwisata);
        $this->KulinerModel->delete($id_kuliner);
        $flash = ['message' => 'Data kuliner Berhasil Dihapus', 'jenis' => 'success', 'icon' => 'fa fa-check'];
        $this->session->setFlashdata('flash', $flash);
        return redirect()->to(base_url('data_kuliner'));
    }
}
