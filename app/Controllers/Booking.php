<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\BookingAcara;
use App\Models\ModelAcara;
use App\Models\ModelGet;

class Booking extends BaseController
{
    public function __construct()
    {
        $this->BookingAcara = new BookingAcara();
        $this->ModelAcara = new ModelAcara();
        $this->validation =  \Config\Services::validation();
        $this->ModelGet = new ModelGet();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $data['title'] = 'Acara';
        $data['sub_title'] = 'Booking Acara';
        $data['booking_acara'] =  $this->BookingAcara->list();
        $data['kategori_acara'] =  $this->ModelGet->getData('s1g_kategori_acara');
        return view('admin/acara/booking', $data);
    }
    function update_booking()
    {
        $status = $this->request->getPost('status');
        $id_booking = $this->request->getPost('id_booking');
        if ($status == 'selesai') {
            $booking =  $this->BookingAcara->where([
                'id_booking' => $id_booking
            ])->first();

            $this->ModelAcara->insert(
                [
                    "id_kategori_acara" =>  $booking['id_kategori_acara'],
                    "nama_tempat" =>  $booking['nama_tempat'],
                    "slug_acara" => url_title($booking['nama_tempat'], '-', true),
                    "tanggal_acara" => $booking['tanggal_acara'],
                    "deskripsi_acara" =>  $booking['deskripsi_acara'],
                    'gambar_acara' =>  $booking['gambar_acara'],
                ]
            );
            copy(WRITEPATH . '../public/acara/booking/' . $booking['gambar_acara'], WRITEPATH . '../public/acara/' . $booking['gambar_acara']);
            $this->BookingAcara->update(
                $id_booking,
                [
                    "status" => $this->request->getPost('status'),
                    "catatan" => $this->request->getPost('catatan'),
                ]
            );
            $flash = ['message' => 'Data Acara Berhasil Diverifikasi, akan ditampilkan', 'jenis' => 'success', 'icon' => 'fa fa-check'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('booking'));
        } else {
            $this->BookingAcara->update(
                $id_booking,
                [
                    "status" => $this->request->getPost('status'),
                    "catatan" => $this->request->getPost('catatan'),
                ]
            );
            $flash = ['message' => 'Data Booking Berhasil Diupdate', 'jenis' => 'success', 'icon' => 'fa fa-check'];
            $this->session->setFlashdata('flash', $flash);
            return redirect()->to(base_url('booking'));
        }
    }
}
