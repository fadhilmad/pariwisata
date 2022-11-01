<?php

namespace App\Controllers;

use App\Models\PenginapanModel;

class Penginapan extends BaseController
{
    public function __construct()
    {
        $this->PenginapanModel = new PenginapanModel();
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $data['title'] = 'Penginapan';
        $data['sub_title'] = 'Data Penginapan';
        $data['penginapan'] =  $this->PenginapanModel->get_penginapan();
        return view('admin/penginapan/list', $data);
    }
    public function add_penginapan()
    {
        helper('form');
        $data['title'] = 'Penginapan';
        $data['sub_title'] = 'Data Penginapan';
        return view('admin/penginapan/add', $data);
    }
    public function rubah_penginapan($id_penginapan)
    {
        helper('form');
        $data['title'] = 'Penginapan';
        $data['sub_title'] = 'Data Penginapan';
        $data['penginapan'] =  $this->PenginapanModel->get_penginapan(['id_penginapan' => $id_penginapan]);
        return view('admin/penginapan/edit', $data);
    }
    public function tambah_penginapan()
    {
        $this->validation->setRules([
            'nama_tempat' => 'required',
            'lokasi_tempat' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'deskripsi_tempat' => 'required',
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,10280]',

        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $upload = $this->request->getFile('gambar');
            $nama_gambar =  $upload->getRandomName();
            $upload->move(WRITEPATH . '../public/penginapan/', $nama_gambar);
            $this->PenginapanModel->insert(
                [
                    "nama_tempat" => $this->request->getPost('nama_tempat'),
                    "lokasi_tempat" => $this->request->getPost('lokasi_tempat'),
                    "latitude" => $this->request->getPost('latitude'),
                    "longitude" => $this->request->getPost('longitude'),
                    "slug" => url_title($this->request->getPost('nama_tempat'), '-', true),
                    "deskripsi_tempat" => $this->request->getPost('deskripsi_tempat'),
                    'gambar' => $nama_gambar
                ]
            );
            $flash = ['message' => 'Data Penginapan Berhasil Ditambahkan', 'jenis' => 'success', 'icon' => 'fa fa-check'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('data_penginapan'));
        } else {
            $flash = ['message' => 'Data Penginapan Gagal Ditambahkan, Lengkapi Form Isian', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('data_penginapan'));
        }
    }
    public function edit_Penginapan()
    {
        $this->validation->setRules([
            'nama_tempat' => 'required',
            'lokasi_tempat' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'deskripsi_tempat' => 'required',
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $this->validation->setRules([
                'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,10280]',
            ]);
            $isGambarValid = $this->validation->withRequest($this->request)->run();
            $id_penginapan = $this->request->getPost('id_penginapan');
            if ($isGambarValid) {
                $PM = $this->PenginapanModel->get_penginapan(['id_penginapan' => $id_penginapan]);
                $gambar = $PM->gambar;
                $path = '../public/penginapan/';
                if (isset($gambar)) {
                    @unlink($path . $gambar);
                    $upload = $this->request->getFile('gambar');
                    $nama_gambar =  $upload->getRandomName();
                    $upload->move(WRITEPATH . '../public/penginapan/', $nama_gambar);
                    $this->PenginapanModel->update(
                        $id_penginapan,
                        [
                            "nama_tempat" => $this->request->getPost('nama_tempat'),
                            "lokasi_tempat" => $this->request->getPost('lokasi_tempat'),
                            "latitude" => $this->request->getPost('latitude'),
                            "slug" => url_title($this->request->getPost('nama_tempat'), '-', true),
                            "longitude" => $this->request->getPost('longitude'),
                            "deskripsi_tempat" => $this->request->getPost('deskripsi_tempat'),
                            'gambar' => $nama_gambar
                        ]
                    );
                    $flash = ['message' => 'Data Penginapan Berhasil Dirubah', 'jenis' => 'success', 'icon' => 'fa fa-check'];
                    $this->session->setFlashdata('flash', $flash);
                    return redirect()->to(base_url('data_penginapan'));
                }
            } else {
                $this->PenginapanModel->update(
                    $id_penginapan,
                    [
                        "nama_tempat" => $this->request->getPost('nama_tempat'),
                        "lokasi_tempat" => $this->request->getPost('lokasi_tempat'),
                        "latitude" => $this->request->getPost('latitude'),
                        "slug" => url_title($this->request->getPost('nama_tempat'), '-', true),
                        "longitude" => $this->request->getPost('longitude'),
                        "deskripsi_tempat" => $this->request->getPost('deskripsi_tempat'),
                    ]
                );
                $flash = ['message' => 'Data Penginapan Berhasil Dirubah', 'jenis' => 'success', 'icon' => 'fa fa-check'];
                $this->session->setFlashdata('flash', $flash);
                return redirect()->to(base_url('data_penginapan'));
            }
        } else {
            $flash = ['message' => 'Data Penginapan Gagal Dirubah, Lengkapi Form Isian', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('data_penginapan'));
        }
    }
    public function hapus_penginapan($id_penginapan)
    {
        $dataPenginapan = $this->PenginapanModel->getWhere_penginapan(['id_penginapan' => $id_penginapan]);
        $path = '../public/penginapan/';
        @unlink($path . $dataPenginapan->gambar_pariwisata);
        $this->PenginapanModel->delete($id_penginapan);
        $flash = ['message' => 'Data Penginapan Berhasil Dihapus', 'jenis' => 'success', 'icon' => 'fa fa-check'];
        $this->session->setFlashdata('flash', $flash);
        return redirect()->to(base_url('data_penginapan'));
    }
}
