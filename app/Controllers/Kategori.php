<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->KategoriModel = new KategoriModel();
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->ketegori = "Kategori";
    }
    public function index()
    {
        $kategori = $this->KategoriModel->get_kategori();
        $data = array(
            'title' => $this->ketegori,
            'sub_title' => 'kategori Pariwisata',
            'kategori' => $kategori
        );
        return view('admin/kategori/list', $data);
    }
    public function add_kategori()
    {
        $this->validation->setRules([
            'nama_kategori' => 'required',

        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $this->KategoriModel->insert(
                [
                    "nama_kategori" => $this->request->getPost('nama_kategori'),
                    "slug" => url_title($this->request->getPost('nama_kategori'), '-', true),
                ]
            );
            $flash = ['message' => 'Data kategori Berhasil Ditambahkan', 'jenis' => 'success', 'icon' => 'fa fa-check'];
        } else {
            $flash = ['message' => 'Data kategori Gagal Ditambahkan', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
        }
        $this->session->setFlashdata('flash', $flash);
        return redirect()->to(base_url('kategori'));
    }
    public function edit_kategori()
    {
        $this->validation->setRules([
            'nama_kategori' => 'required',
            'slug' => 'required',
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $id_kategori = $this->request->getPost('id_kategori');
            $this->KategoriModel->update(
                $id_kategori,
                [
                    "nama_kategori" => $this->request->getPost('nama_kategori'),
                    "slug" => $this->request->getPost('slug'),
                ]
            );
            $flash = ['message' => 'Data kategori Berhasil Diubah', 'jenis' => 'success', 'icon' => 'fa fa-check'];
        } else {
            $flash = ['message' => 'Data kategori Gagal Diubah', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
        }
        $this->session->setFlashdata('flash', $flash);
        return redirect()->to(base_url('kategori'));
    }
    public function delete_kategori($id_kategori)
    {
        $cek = $this->KategoriModel->cekKategori($id_kategori);
        if ($cek) {
            $flash = ['message' => 'Data kategori Tidak Dapat Dihapus, Karena Terpakai Pada Tabel Pariwisata', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
        } else {
            $this->KategoriModel->delete($id_kategori);
            $flash = ['message' => 'Data Jenis Berhasil Dihapus', 'jenis' => 'success', 'icon' => 'fa fa-check'];
        }
        $this->session->setFlashdata('flash', $flash);
        return redirect()->to(base_url('kategori'));
    }
}
