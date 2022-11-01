<?php

namespace App\Controllers;

use App\Models\ModelGet;
use App\Models\KategoriAcara;

class Kategori_acara extends BaseController
{
    public function __construct()
    {
        $this->ModelGet = new ModelGet();
        $this->KategoriAcara = new KategoriAcara();
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
    }
    function index()
    {
        $data['title'] = 'Kategori Acara';
        $data['sub_title'] = 'Data Kategori Acara';
        $data['kategori_acara'] =  $this->ModelGet->getData('s1g_kategori_acara');

        return view('admin/kategori_acara/list', $data);
    }
    public function add_kategori_acara()
    {
        $this->validation->setRules([
            'kategori_acara' => 'required',
        ]);
        $cek_slug = $this->ModelGet->cek_judul('s1g_kategori_acara', ['kategori_acara' => $this->request->getPost('kategori_acara')]);
        if ($cek_slug) {
            $flash = ['message' => 'Data kategori Gagal Ditambahkan, data tersebut sudah ada', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('kategori_acara'));
        } else {
            $isDataValid = $this->validation->withRequest($this->request)->run();
            if ($isDataValid) {
                $this->KategoriAcara->insert(
                    [
                        "kategori_acara" => $this->request->getPost('kategori_acara'),
                        "slug" => url_title($this->request->getPost('kategori_acara'), '-', true),
                    ]
                );
                $flash = ['message' => 'Data kategori Berhasil Ditambahkan', 'jenis' => 'success', 'icon' => 'fa fa-check'];
                $this->session->setFlashdata('flash', $flash);
                return redirect()->to(base_url('kategori_acara'));
            } else {
                $flash = ['message' => 'Data kategori Gagal Ditambahkan', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
                $this->session->setFlashdata('flash', $flash);
                return redirect()->to(base_url('kategori_acara'));
            }
        }
    }
    public function edit_kategori_acara()
    {
        $this->validation->setRules([
            'kategori_acara' => 'required',
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $id_kategori_acara = $this->request->getPost('id_kategori_acara');
            $this->KategoriAcara->update(
                $id_kategori_acara,
                [
                    "kategori_acara" => $this->request->getPost('kategori_acara'),
                    "slug" => url_title($this->request->getPost('kategori_acara'), '-', true),
                ]
            );
            $flash = ['message' => 'Data kategori Berhasil Diubah', 'jenis' => 'success', 'icon' => 'fa fa-check'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('kategori_acara'));
        } else {
            $flash = ['message' => 'Data kategori Gagal Diubah', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('kategori_acara'));
        }
    }
    public function delete_kategori_acara($id_kategori_acara)
    {
        $cek = $this->KategoriAcara->cekKategori($id_kategori_acara);
        if ($cek) {
            $flash = ['message' => 'Data kategori acara Tidak Dapat Dihapus, Karena Terpakai Pada Tabel Acara', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
        } else {
            $this->KategoriAcara->delete($id_kategori_acara);
            $flash = ['message' => 'Data Kategori acara Berhasil Dihapus', 'jenis' => 'success', 'icon' => 'fa fa-check'];
        }
        $this->session->setFlashdata('flash', $flash);
        return redirect()->to(base_url('kategori_acara'));
    }
}
