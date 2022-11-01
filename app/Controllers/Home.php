<?php

namespace App\Controllers;

class Home extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {

        $data['jml_peta'] = $this->db->table('s1g_pariwisata')->countAllResults();
        $data['jml_kategori'] = $this->db->table('s1g_kategori')->countAllResults();
        $data['jml_kategori_acara'] = $this->db->table('s1g_kategori_acara')->countAllResults();
        $data['jml_acara'] = $this->db->table('s1g_acara')->countAllResults();
        $data['jml_penginapan'] = $this->db->table('s1g_penginapan')->countAllResults();
        $data['jml_kuliner'] = $this->db->table('s1g_kuliner')->countAllResults();

        $data['title'] = 'Dashboard';
        $data['sub_title'] = 'Selamat Datang Di Dashboard SIG Pariwisata Lamongan :)';
        return view('admin/home', $data);
    }
}
