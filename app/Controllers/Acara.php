<?php

namespace App\Controllers;

use App\Models\ModelAcara;
use App\Models\ModelGet;
use App\Models\AlbumAcaraModel;

class Acara extends BaseController
{
    public function __construct()
    {
        $this->ModelAcara = new ModelAcara();
        $this->AlbumAcaraModel = new AlbumAcaraModel();
        $this->ModelGet = new ModelGet();
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $data['title'] = 'Acara';
        $data['sub_title'] = 'Data Acara';
        $data['acara'] =  $this->ModelAcara->list();
        $data['kategori_acara'] =  $this->ModelGet->getData('s1g_kategori_acara');

        return view('admin/acara/list', $data);
    }
    public function tambah_acara()
    {
        $this->validation->setRules([
            'id_kategori_acara' => 'required',
            'nama_tempat' => 'required',
            'tanggal_acara' => 'required',
            'deskripsi_acara' => 'required',
            'gambar_acara' => 'uploaded[gambar_acara]|mime_in[gambar_acara,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_acara,10280]',

        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $upload = $this->request->getFile('gambar_acara');
            $nama_gambar =  $upload->getRandomName();
            $upload->move(WRITEPATH . '../public/acara/', $nama_gambar);
            $this->ModelAcara->insert(
                [
                    "id_kategori_acara" => $this->request->getPost('id_kategori_acara'),
                    "nama_tempat" => $this->request->getPost('nama_tempat'),
                    "slug_acara" => url_title($this->request->getPost('nama_tempat'), '-', true),
                    "tanggal_acara" => $this->request->getPost('tanggal_acara'),
                    "deskripsi_acara" => $this->request->getPost('deskripsi_acara'),
                    'gambar_acara' => $nama_gambar
                ]
            );
            $flash = ['message' => 'Data Acara Berhasil Ditambahkan', 'jenis' => 'success', 'icon' => 'fa fa-check'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('event'));
        } else {
            $flash = ['message' => 'Data Acara Gagal Ditambahkan, Lengkapi Form Isian', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('event'));
        }
    }
    public function edit_acara()
    {
        $this->validation->setRules([
            'id_kategori_acara' => 'required',
            'nama_tempat' => 'required',
            'tanggal_acara' => 'required',
            'deskripsi_acara' => 'required',
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $this->validation->setRules([
                'gambar_acara' => 'uploaded[gambar_acara]|mime_in[gambar_acara,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_acara,10280]',
            ]);
            $isGambarValid = $this->validation->withRequest($this->request)->run();
            $id_acara = $this->request->getPost('id_acara');
            if ($isGambarValid) {
                $PM = $this->ModelAcara->list(['id_acara' => $id_acara]);
                $gambar = $PM->gambar_acara;
                $path = '../public/acara/';
                if (isset($gambar)) {
                    @unlink($path . $gambar);
                    $upload = $this->request->getFile('gambar_acara');
                    $nama_gambar =  $upload->getRandomName();
                    $upload->move(WRITEPATH . '../public/acara/', $nama_gambar);
                    $this->ModelAcara->update(
                        $id_acara,
                        [
                            "id_kategori_acara" => $this->request->getPost('id_kategori_acara'),
                            "nama_tempat" => $this->request->getPost('nama_tempat'),
                            "tanggal_acara" => $this->request->getPost('tanggal_acara'),
                            "slug_acara" => url_title($this->request->getPost('nama_tempat'), '-', true),
                            "deskripsi_acara" => $this->request->getPost('deskripsi_acara'),
                            'gambar_acara' => $nama_gambar
                        ]
                    );
                    $flash = ['message' => 'Data Acara Berhasil Dirubah', 'jenis' => 'success', 'icon' => 'fa fa-check'];
                    $this->session->setFlashdata('flash', $flash);
                    return redirect()->to(base_url('event'));
                }
            } else {
                $this->ModelAcara->update(
                    $id_acara,
                    [
                        "id_kategori_acara" => $this->request->getPost('id_kategori_acara'),
                        "nama_tempat" => $this->request->getPost('nama_tempat'),
                        "tanggal_acara" => $this->request->getPost('tanggal_acara'),
                        "slug_acara" => url_title($this->request->getPost('nama_tempat'), '-', true),
                        "deskripsi_acara" => $this->request->getPost('deskripsi_acara'),
                    ]
                );
                $flash = ['message' => 'Data Acara Berhasil Dirubah', 'jenis' => 'success', 'icon' => 'fa fa-check'];
                $this->session->setFlashdata('flash', $flash);
                return redirect()->to(base_url('event'));
            }
        } else {
            $flash = ['message' => 'Data Acara Gagal Dirubah, Lengkapi Form Isian', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('event'));
        }
    }
    public function simpan_album_acara()
    {
        $this->validation->setRules([
            'id_acara' => 'required',
            'nama' => 'required',
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,10280]',
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $upload = $this->request->getFile('gambar');
            $newName = $upload->getRandomName();

            $upload->move('../public/acara/album/', $newName);

            $this->AlbumAcaraModel->insert(
                [
                    "id_acara" => $this->request->getPost('id_acara'),
                    "nama" => $this->request->getPost('nama'),
                    'gambar' =>  $newName,
                ]
            );
            $flash = ['message' => 'Album acara Berhasil Ditambahkan', 'jenis' => 'success', 'icon' => 'fa fa-check'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('detail_album_acara/' . $this->request->getPost('id_acara')));
        } else {
            $flash = ['message' => 'Album acara Gagal Ditambahkan, Lengkapi Form Isian', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('detail_album_acara/' . $this->request->getPost('id_acara')));
        }
    }

    public function detail_album_acara($id_acara)
    {
        helper('form');
        $data = array(
            'title' =>  'Acara',
            'sub_title' => "Data acara",
            'acara' => $this->ModelAcara->get_acara_row(['s1g_acara.id_acara' => $id_acara]),
            'album' => $this->AlbumAcaraModel->get_album_acara(['s1g_acara.id_acara' => $id_acara]),
        );
        return view('admin/acara/detail_album', $data);
    }

    public function all_album_acara()
    {

        $data = array(
            'title' =>  'Acara',
            'sub_title' => "Data acara",
            'acara' => $this->AlbumAcaraModel->get_album_acara_count(),
            'album' => $this->AlbumAcaraModel->get_album_acara(),
        );
        return view('admin/acara/album', $data);
    }
    public function hapus_album_acara($id)
    {
        $album = $this->AlbumAcaraModel->where([
            'id' => $id,
        ])->first();
        $id_acara = $album['id_acara'];
        $path = '../public/acara/album/';
        @unlink($path . $album['gambar']);
        $this->AlbumAcaraModel->delete($album['id']);
        $flash = ['message' => 'Album Acara Berhasil Dihapus', 'jenis' => 'warning', 'icon' => 'fa fa-check'];
        $this->session->setFlashdata('flash', $flash);
        return redirect()->to(base_url('detail_album_acara/' . $id_acara));
    }
    public function hapus_acara($id_acara)
    {
        $dataAcara = $this->ModelAcara->list(['id_acara' => $id_acara]);
        $path = '../public/acara/';
        @unlink($path . $dataAcara->gambar_acara);
        $this->ModelAcara->delete($id_acara);
        $flash = ['message' => 'Data Acara Berhasil Dihapus', 'jenis' => 'success', 'icon' => 'fa fa-check'];
        $this->session->setFlashdata('flash', $flash);
        return redirect()->to(base_url('event'));
    }
}
