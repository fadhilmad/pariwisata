<?php

namespace App\Controllers;

use App\Models\PariwisataModel;
use App\Models\KategoriModel;
use App\Models\ModelAcara;
use App\Models\BookingAcara;
use App\Models\KategoriAcara;
use App\Models\KulinerModel;
use App\Models\PenginapanModel;
use App\Models\AlbumAcaraModel;
use App\Models\FeedbackModel;
use App\Models\AlbumPetaModel;
use App\Models\KomentarModel;
use App\Models\TokoModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->KomentarModel = new KomentarModel();
        $this->toko = new TokoModel();
        $this->KulinerModel = new KulinerModel();
        $this->AlbumPetaModel = new AlbumPetaModel();
        $this->FeedbackModel = new FeedbackModel();
        $this->AlbumAcaraModel = new AlbumAcaraModel();
        $this->PenginapanModel = new PenginapanModel();
        $this->KategoriAcara = new KategoriAcara();
        $this->BookingAcara = new BookingAcara();
        $this->ModelAcara = new ModelAcara();
        $this->KategoriModel = new KategoriModel();
        $this->PariwisataModel = new PariwisataModel();
        $this->validation =  \Config\Services::validation();
        date_default_timezone_set("Asia/Jakarta");
        helper('form');
    }
    public function index()
    {
        $data['wisata'] = $this->PariwisataModel->get_wisata();
        $data['title'] = 'Dashboard';
        return view('main/home', $data);
    }
    public function akun()
    {
        $data['title'] = 'Akun Saya';
        $data['booking_acara'] =  $this->BookingAcara->list_where(['s1g_booking_acara.id_user' => session()->get('id_user')]);
        return view('main/akun', $data);
    }
    public function acara()
    {
        helper('form');
        $data['title'] = 'Acara';
        $data['kat_acara'] = $this->ModelAcara->get_kat_acara_count();
        $data['acara'] =  $this->ModelAcara->list();
        $data['lokasi'] = $this->PariwisataModel->get_wisata();
        return view('main/acara', $data);
    }
    public function view_parwiwisata()
    {
        $data['wisata'] = $this->PariwisataModel->get_wisata();
        $data['title'] = 'Peta Sebaran';
        return view('main/view_pariwisata', $data);
    }
    public function destinasi()
    {
        $data['wisata'] = $this->PariwisataModel->get_wisata();
        $data['title'] = 'Destinasi';
        return view('main/destinasi', $data);
    }
    public function kategori_destinasi($slug)
    {
        $data['kategori'] = $this->KategoriModel->where([
            'slug' => $slug,
        ])->first();
        $data['wisata'] = $this->PariwisataModel->get_wisata(['s1g_kategori.slug' => $slug]);
        $data['title'] = 'Destinasi';

        return view('main/destinasi', $data);
    }
    public function kategori_acara($slug)
    {
        $data['kategori_acara'] = $this->KategoriAcara->where([
            'slug' => $slug,
        ])->first();
        $data['acara'] =  $this->ModelAcara->list_kategori(['s1g_kategori_acara.slug' => $slug]);
        $data['title'] = 'Acara';
        $data['lokasi'] = $this->PariwisataModel->get_wisata();
        $data['kat_acara'] = $this->ModelAcara->get_kat_acara_count();

        return view('main/acara', $data);
    }
    public function kategori_acara_lalu()
    {
        $hariIni = date('Y-m-d');
        $data['acara'] = $this->ModelAcara->list_where_result(['s1g_acara.tanggal_acara <' => $hariIni]);
        $data['title'] = 'Acara';
        $data['waktu'] = 'Yang Telah Berlalu';
        return view('main/acara', $data);
    }
    public function kategori_acara_kini()
    {
        $hariIni = date('Y-m-d');
        $data['acara'] = $this->ModelAcara->list_where_result(['s1g_acara.tanggal_acara >=' => $hariIni]);
        $data['title'] = 'Acara';
        $data['waktu'] = 'Belum/Sedang Berlangsung';
        return view('main/acara', $data);
    }
    public function detail_destinasi($slug_pariwisata)
    {
        $pariwisata = $this->PariwisataModel->getWhere_wisata($slug_pariwisata);
        $id_pariwisata = $pariwisata->id_pariwisata;
        $data = array(
            'title' => 'Detail Destinasi',
            'kategori' =>  $this->PariwisataModel->get_wisata_count(),
            'pariwisata' => $pariwisata,
            'komentar' => $this->KomentarModel->get_komentar($id_pariwisata),
            'album' => $this->AlbumPetaModel->get_album_wisata(['s1g_pariwisata.id_pariwisata' => $id_pariwisata]),
            'recent' => $this->PariwisataModel->orderBy('id_pariwisata', 'desc')->findAll(4),
        );
        return view('main/detail_destinasi', $data);
    }
    public function detail_acara($slug_acara)
    {
        $hariIni = date('Y-m-d');
        $acara_kini =  $this->ModelAcara->list_array(['s1g_acara.tanggal_acara >=' => $hariIni]);
        $acara_lalu =  $this->ModelAcara->list_array(['s1g_acara.tanggal_acara <' => $hariIni]);
        $acara = $this->ModelAcara->list(['s1g_acara.slug_acara' => $slug_acara]);

        $id_acara =  $acara->id_acara;
        $data = array(
            'title' => 'Detail Acara',
            'kategori_acara' =>  $this->ModelAcara->get_kat_acara_count(),
            'acara_kini' => $acara_kini,
            'acara_lalu' => $acara_lalu,
            'acara' =>  $acara,
            'album' => $this->AlbumAcaraModel->get_album_acara(['s1g_acara.id_acara' => $id_acara]),
            'recent' => $this->ModelAcara->orderBy('id_acara', 'desc')->findAll(4),
        );
        return view('main/detail_acara', $data);
    }

    public function kuliner()
    {
        $data['title'] = 'Kuliner';
        $data['kuliner'] =  $this->KulinerModel->get_kuliner();
        return view('main/kuliner', $data);
    }
    public function detail_kuliner($slug)
    {
        $kuliner =  $this->KulinerModel->getWhere_kuliner($slug);

        $data = array(
            'title' => 'Detail kuliner',
            'kuliner' => $kuliner,
            'recent' => $this->KulinerModel->orderBy('id_kuliner', 'desc')->findAll(4),
            'toko' => $this->toko->get_toko(['s1g_kuliner.id_kuliner' => $kuliner->id_kuliner]),
        );
        return view('main/detail_kuliner', $data);
    }
    public function detail_toko($slug, $slug_toko)
    {
        $kuliner =  $this->KulinerModel->getWhere_kuliner($slug);
        $data = array(
            'title' => 'Detail Toko',
            'kuliner' => $kuliner,
            'toko' => $this->toko->get_toko_row(['slug_toko' => $slug_toko]),
            'toko_all' => $this->toko->get_toko(['s1g_kuliner.id_kuliner' => $kuliner->id_kuliner, 'slug_toko !=' => $slug_toko]),
        );
        return view('main/detail_toko', $data);
    }
    public function penginapan()
    {
        $data['title'] = 'Penginapan';
        $data['penginapan'] =  $this->PenginapanModel->get_penginapan();
        return view('main/penginapan', $data);
    }
    public function detail_penginapan($slug)
    {
        $data = array(
            'title' => 'Detail penginapan',
            'penginapan' =>  $this->PenginapanModel->getWhere_penginapan($slug),
            'recent' => $this->PenginapanModel->orderBy('id_penginapan', 'desc')->findAll(4),
        );
        return view('main/detail_penginapan', $data);
    }
    public function feedback()
    {
        $this->FeedbackModel->insert(
            [
                "nama" => $this->request->getPost('name'),
                "email" => $this->request->getPost('email'),
                "pesan" => $this->request->getPost('message'),

            ]
        );
        $this->session->setFlashdata('message', 'feedback berhasil dikirim');
        return redirect()->to(base_url('/dashboard/#contact'));
    }
    public function isi_komentar()
    {
        $id_pariwisata = $this->request->getPost('id_pariwisata');
        $data_pariwisata = $this->PariwisataModel->where([
            'id_pariwisata' => $id_pariwisata,
        ])->first();
        $this->KomentarModel->insert(
            [
                "id_pariwisata" => $id_pariwisata,
                "id_user" => $this->request->getPost('id_user'),
                "isi" => $this->request->getPost('comment'),
                "rating" => $this->request->getPost('input-1'),
                "tanggal" => date('Y-m-d')
            ]
        );
        $flash = ['message' => 'Komentar Berhasil dikirim', 'jenis' => 'success'];
        $this->session->setFlashdata('flash', $flash);
        return redirect()->to(base_url('detail_destinasi/' . $data_pariwisata['slug_pariwisata']));
    }
    public function hapus_komentar($id_komentar)
    {
        $data_komentar = $this->KomentarModel->where([
            'id_komentar' => $id_komentar,
        ])->first();
        $data_pariwisata = $this->PariwisataModel->where([
            'id_pariwisata' => $data_komentar['id_pariwisata'],
        ])->first();

        $this->KomentarModel->delete($id_komentar);
        $flash = ['message' => 'Komentar Berhasil dihapus', 'jenis' => 'success'];
        $this->session->setFlashdata('flash', $flash);
        return redirect()->to(base_url('detail_destinasi/' . $data_pariwisata['slug_pariwisata']));
    }
    public function user_tambah_acara()
    {
        $this->validation->setRules([
            'id_kategori_acara' => 'required',
            'tanggal_acara' => 'required',
            'deskripsi_acara' => 'required',
            'gambar_acara' => 'uploaded[gambar_acara]|mime_in[gambar_acara,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_acara,10280]',

        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $id_tempat = $this->request->getPost('id_pariwisata');

            if ($id_tempat != '0') {
                $pariwisata = $this->PariwisataModel->getWhere_wisata($id_tempat);
                $nama_tempat = $pariwisata->nama_pariwisata;
            } else {
                $nama_tempat = $this->request->getPost('nama_tempat');
            }
            $tgl = $this->request->getPost('tanggal_acara');
            $cek_jadwal =  $this->ModelAcara->where([
                'tanggal_acara' => $tgl,
                'nama_tempat' => $nama_tempat,
            ])->first();
            if (empty($cek_jadwal)) {
                $cek_booking =  $this->BookingAcara->where([
                    'tanggal_acara' => $tgl,
                    'nama_tempat' => $nama_tempat,
                ])->first();
                if (empty($cek_booking)) {
                    $upload = $this->request->getFile('gambar_acara');
                    $nama_gambar =  $upload->getRandomName();
                    $upload->move(WRITEPATH . '../public/acara/booking/', $nama_gambar);
                    $this->BookingAcara->insert(
                        [
                            "id_kategori_acara" => $this->request->getPost('id_kategori_acara'),
                            "nama_tempat" => $nama_tempat,
                            "tanggal_acara" => $tgl,
                            "deskripsi_acara" => $this->request->getPost('deskripsi_acara'),
                            "id_user" => session()->get('id_user'),
                            'gambar_acara' => $nama_gambar
                        ]
                    );
                    $flash = ['message' => 'Booking Acara Berhasil Diajukan', 'jenis' => 'success', 'icon' => 'fa fa-check'];
                    $this->session->setFlashdata('flash', $flash);
                    return redirect()->to(base_url('view_acara'));
                } else {
                    $flash = ['message' => 'Booking Acara Gagal Diajukan, tempat dan tanggal tersebut sudah dibooking', 'jenis' => 'warning', 'icon' => 'fa fa-times'];
                    $this->session->setFlashdata('flash', $flash);
                    return redirect()->to(base_url('view_acara'));
                }
            } else {
                $flash = ['message' => 'Booking Acara Gagal Diajukan, tempat dan tanggal tersebut sudah dipakai acara lain', 'jenis' => 'warning', 'icon' => 'fa fa-times'];
                $this->session->setFlashdata('flash', $flash);
                return redirect()->to(base_url('view_acara'));
            }
        } else {
            $flash = ['message' => 'Booking Acara Gagal Diajukan, Lengkapi Form Isian', 'jenis' => 'danger', 'icon' => 'fa fa-ban'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('view_acara'));
        }
    }
    public function bayar_booking()
    {
        $id_booking = $this->request->getPost('id_booking');
        $upload = $this->request->getFile('bukti_bayar');
        $nama_gambar =  $upload->getRandomName();
        $upload->move(WRITEPATH . '../public/acara/booking/bukti_bayar/', $nama_gambar);
        $this->BookingAcara->update(
            $id_booking,
            [
                'bukti_bayar' => $nama_gambar
            ]
        );
        $flash = ['message' => 'Upload Bukti pembayaran berhasil', 'jenis' => 'success', 'icon' => 'fa fa-check'];
        $this->session->setFlashdata('flash', $flash);
        return redirect()->to(base_url('akun_saya'));
    }
}
// noted : rubah bagian bla blabbla 