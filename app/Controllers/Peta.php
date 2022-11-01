<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\PariwisataModel;
use App\Models\AlbumPetaModel;

class Peta extends BaseController
{
    public function __construct()
    {
        $this->KategoriModel = new KategoriModel();
        $this->AlbumPetaModel = new AlbumPetaModel();
        $this->PariwisataModel = new PariwisataModel();
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->pariwisata = "Pariwisata";
    }
    function index()
    {
        $data = array(
            'title' =>  $this->pariwisata,
            'sub_title' => "Data Pariwisata",
            'wisata' => $this->PariwisataModel->get_wisata()
        );
        return view('admin/peta/list', $data);
    }
    function persebaran_peta()
    {
        $data = array(
            'title' =>  $this->pariwisata,
            'sub_title' => "Peta Persebaran Pariwisata",
            'wisata' => $this->PariwisataModel->get_wisata()
        );
        return view('admin/peta/maps', $data);
    }
    function tambah_peta()
    {
        helper('form');
        $data = array(
            'title' =>  $this->pariwisata,
            'sub_title' => "Tambah Data Pariwisata",
            'kategori' => $this->KategoriModel->get_kategori()
        );
        return view('admin/peta/tambah', $data);
    }
    function edit_peta($id_pariwisata)
    {
        helper('form');

        $data = array(
            'title' => $this->pariwisata,
            'sub_title' => "Tambah Data Pariwisata",
            'kategori' => $this->KategoriModel->get_kategori(),
            'pariwisata' => $this->PariwisataModel->getWhere_pariwisata($id_pariwisata),
        );
        return view('admin/peta/edit', $data);
    }
    public function simpan_peta()
    {
        $this->validation->setRules([
            'id_kategori' => 'required',
            'nama_pariwisata' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'lokasi_pariwisata' => 'required',
            'deskripsi_pariwisata' => 'required',
            'gambar_pariwisata' => 'uploaded[gambar_pariwisata]|mime_in[gambar_pariwisata,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_pariwisata,10280]',

        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $upload = $this->request->getFile('gambar_pariwisata');
            $upload->move('../public/images/');
            $this->PariwisataModel->insert(
                [
                    "id_kategori" => $this->request->getPost('id_kategori'),
                    "nama_pariwisata" => $this->request->getPost('nama_pariwisata'),
                    "latitude" => $this->request->getPost('latitude'),
                    "longitude" => $this->request->getPost('longitude'),
                    "slug_pariwisata" => url_title($this->request->getPost('nama_pariwisata'), '-', true),
                    'gambar_pariwisata' => $upload->getName(),
                    "lokasi_pariwisata" => $this->request->getPost('lokasi_pariwisata'),
                    "deskripsi_pariwisata" => $this->request->getPost('deskripsi_pariwisata'),

                ]
            );
            $flash = ['message' => 'Data Pariwisata Berhasil Ditambahkan', 'jenis' => 'success', 'icon' => 'fa fa-check'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('peta'));
        } else {
            $flash = ['message' => 'Data Pariwisata Gagal Ditambahkan, Lengkapi Form Isian', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('tambah_peta'));
        }
    }

    public function rubah_peta($id_pariwisata)
    {
        $this->validation->setRules([
            'id_kategori' => 'required',
            'nama_pariwisata' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'lokasi_pariwisata' => 'required',
            'deskripsi_pariwisata' => 'required',
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $this->validation->setRules([
                'gambar' => 'uploaded[gambar_pariwisata]|mime_in[gambar_pariwisata,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_pariwisata,10280]',
            ]);
            $isGambarValid = $this->validation->withRequest($this->request)->run();
            if ($isGambarValid) {

                $PM = $this->PariwisataModel->get_wisata_row(['id_pariwisata' => $id_pariwisata]);
                $gambar = $PM->gambar_pariwisata;
                $path = '../public/images/';
                if (isset($gambar)) {
                    @unlink($path . $gambar);
                    $upload = $this->request->getFile('gambar_pariwisata');
                    $upload->move('../public/images/');
                    $this->PariwisataModel->update(
                        $id_pariwisata,
                        [
                            "id_kategori" => $this->request->getPost('id_kategori'),
                            "nama_pariwisata" => $this->request->getPost('nama_pariwisata'),
                            "latitude" => $this->request->getPost('latitude'),
                            "longitude" => $this->request->getPost('longitude'),
                            "slug_pariwisata" => url_title($this->request->getPost('nama_pariwisata'), '-', true),
                            'gambar_pariwisata' => $upload->getName(),
                            "lokasi_pariwisata" => $this->request->getPost('lokasi_pariwisata'),
                            "deskripsi_pariwisata" => $this->request->getPost('deskripsi_pariwisata'),
                        ]
                    );
                }
            } else {
                $this->PariwisataModel->update(
                    $id_pariwisata,
                    [
                        "id_kategori" => $this->request->getPost('id_kategori'),
                        "nama_pariwisata" => $this->request->getPost('nama_pariwisata'),
                        "latitude" => $this->request->getPost('latitude'),
                        "longitude" => $this->request->getPost('longitude'),
                        "slug_pariwisata" => url_title($this->request->getPost('nama_pariwisata'), '-', true),
                        "lokasi_pariwisata" => $this->request->getPost('lokasi_pariwisata'),
                        "deskripsi_pariwisata" => $this->request->getPost('deskripsi_pariwisata'),
                    ]
                );
            }
            $flash = ['message' => 'Data Pariwisata Berhasil Diperbarui', 'jenis' => 'success', 'icon' => 'fa fa-check'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('peta'));
        } else {
            $flash = ['message' => 'Data Pariwisata Gagal Diperbarui, Lengkapi Form Pengisian', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('tambah_peta'));
        }
    }
    public function simpan_album_peta()
    {
        $this->validation->setRules([
            'id_pariwisata' => 'required',
            'nama' => 'required',
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,10280]',

        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $upload = $this->request->getFile('gambar');
            $newName = $upload->getRandomName();

            $upload->move('../public/images/album/', $newName);

            $this->AlbumPetaModel->insert(
                [
                    "id_pariwisata" => $this->request->getPost('id_pariwisata'),
                    "nama" => $this->request->getPost('nama'),
                    'gambar' =>  $newName,

                ]
            );
            $flash = ['message' => 'Album Pariwisata Berhasil Ditambahkan', 'jenis' => 'success', 'icon' => 'fa fa-check'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('detail_album_peta/' . $this->request->getPost('id_pariwisata')));
        } else {
            $flash = ['message' => 'Album Pariwisata Gagal Ditambahkan, Lengkapi Form Isian', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('detail_album_peta/' . $this->request->getPost('id_pariwisata')));
        }
    }

    public function hapus_album_peta($id)
    {
        $album = $this->AlbumPetaModel->where([
            'id' => $id,
        ])->first();
        $id_pariwisata = $album['id_pariwisata'];
        $path = '../public/images/album/';
        @unlink($path . $album['gambar']);
        $this->AlbumPetaModel->delete($album['id']);
        $flash = ['message' => 'Album Pariwisata Berhasil Dihapus', 'jenis' => 'warning', 'icon' => 'fa fa-check'];
        $this->session->setFlashdata('flash', $flash);
        return redirect()->to(base_url('detail_album_peta/' . $id_pariwisata));
    }
    public function detail_album_peta($id_pariwisata)
    {
        helper('form');
        $data = array(
            'title' =>  $this->pariwisata,
            'sub_title' => "Detail Album Pariwisata",
            'wisata' => $this->PariwisataModel->get_wisata_row(['s1g_pariwisata.id_pariwisata' => $id_pariwisata]),
            'album' => $this->AlbumPetaModel->get_album_wisata(['s1g_pariwisata.id_pariwisata' => $id_pariwisata]),
        );
        return view('admin/peta/detail_album', $data);
    }

    public function all_album_peta()
    {
        $data = array(
            'title' =>  $this->pariwisata,
            'sub_title' => "Data Album Pariwisata",
            'wisata' => $this->AlbumPetaModel->get_album_wisata_count(),
            'album' => $this->AlbumPetaModel->get_album_wisata(),
        );
        return view('admin/peta/album', $data);
    }
    public function delete_peta($id_pariwisata)
    {
        $dataUser = $this->PariwisataModel->where([
            'id_pariwisata' => $id_pariwisata,
        ])->first();
        $path = '../public/images/';
        @unlink($path . $dataUser['gambar_pariwisata']);
        $this->PariwisataModel->delete($id_pariwisata);
        $flash = ['message' => 'Data Pariwisata Berhasil Dihapus', 'jenis' => 'warning', 'icon' => 'fa fa-check'];
        $this->session->setFlashdata('flash', $flash);
        return redirect()->to(base_url('peta'));
    }
}
