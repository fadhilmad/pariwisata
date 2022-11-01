<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TokoModel;
use App\Models\KulinerModel;

class TokoKuliner extends BaseController
{

    function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->toko = new TokoModel();
        $this->KulinerModel = new KulinerModel();
    }

    function index($id_kuliner)
    {
        helper('form');
        $data['title'] = 'Kuliner';
        $data['sub_title'] = 'Data Toko Kuliner';
        $data['kuliner'] =   $this->KulinerModel->get_kuliner_where(['id_kuliner' => $id_kuliner]);
        $data['toko'] =  $this->toko->get_toko(['s1g_kuliner.id_kuliner' => $id_kuliner]);
        return view('admin/toko/list', $data);
    }
    public function tambah()
    {
        $data_toko = $this->toko->where([
            'nama_toko' => $this->request->getPost('nama_toko'),
            "id_kuliner" => $this->request->getPost('id_kuliner'),
        ])->first();
        if ($data_toko != null) {
            $flash = ['message' => 'Data Toko kuliner Gagal Ditambahkan, Nama toko tersebut sudah ada', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('toko/' . $this->request->getPost('id_kuliner')));
        }
        helper('form');
        $this->validation->setRules([
            'nama_toko' => 'required',
            'alamat' => 'required',
            'foto' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,10280]',

        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $upload = $this->request->getFile('foto');
            $nama_gambar =  $upload->getRandomName();
            $upload->move(WRITEPATH . '../public/kuliner/toko/', $nama_gambar);
            $this->toko->insert(
                [
                    "id_kuliner" => $this->request->getPost('id_kuliner'),
                    "nama_toko" => $this->request->getPost('nama_toko'),
                    "alamat" => $this->request->getPost('alamat'),
                    "slug_toko" => url_title($this->request->getPost('nama_toko'), '-', true),
                    'foto' => $nama_gambar
                ]
            );
            $flash = ['message' => 'Data Toko kuliner Berhasil Ditambahkan', 'jenis' => 'success', 'icon' => 'fa fa-check'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('toko/' . $this->request->getPost('id_kuliner')));
        } else {
            $flash = ['message' => 'Data Toko kuliner Gagal Ditambahkan, Lengkapi Form Isian', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('toko/' . $this->request->getPost('id_kuliner')));
        }
    }
    public function hapus($id_toko)
    {
        $data_toko = $this->toko->where([
            'id_toko' => $id_toko,
        ])->first();
        $id_kuliner = $data_toko['id_kuliner'];
        $path = '../public/kuliner/toko/';
        @unlink($path . $data_toko['foto']);
        $this->toko->delete($id_toko);
        $flash = ['message' => 'Data  Toko kuliner Berhasil Dihapus', 'jenis' => 'success', 'icon' => 'fa fa-check'];
        $this->session->setFlashdata('flash', $flash);
        return redirect()->to(base_url('toko/' . $id_kuliner));
    }
}
