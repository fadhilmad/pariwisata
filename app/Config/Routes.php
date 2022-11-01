<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$filter = ['filter' => 'userLogin'];
$routes->get('/', 'Dashboard::index');
$routes->get('detail_destinasi/(:any)', 'Dashboard::detail_destinasi/$1');
$routes->get('detail_acara/(:any)', 'Dashboard::detail_acara/$1');
$routes->get('detail_kuliner/(:any)', 'Dashboard::detail_kuliner/$1');
$routes->get('detail_penginapan/(:any)', 'Dashboard::detail_penginapan/$1');
$routes->get('view_kuliner', 'Dashboard::kuliner');
$routes->get('view_penginapan', 'Dashboard::penginapan');
$routes->get('view_acara', 'Dashboard::acara');
$routes->get('view_pariwisata', 'Dashboard::view_parwiwisata');
$routes->get('view_destinasi', 'Dashboard::destinasi');
$routes->add('users_feedback', 'Dashboard::feedback');
$routes->get('kategori_destinasi/(:any)', 'Dashboard::kategori_destinasi/$1');
$routes->get('kategori_acara/(:any)', 'Dashboard::kategori_acara/$1');
$routes->get('kategori_acara_lalu', 'Dashboard::kategori_acara_lalu');
$routes->add('isi_komentar', 'Dashboard::isi_komentar');
$routes->get('kategori_acara_kini', 'Dashboard::kategori_acara_kini');
$routes->get('login_user', 'UserLogin::index');
$routes->get('logout_user', 'UserLogin::logout');
$routes->add('user_tambah_acara', 'Dashboard::user_tambah_acara');
$routes->add('bayar_booking', 'Dashboard::bayar_booking');
$routes->get('hapus_komentar/(:any)', 'Dashboard::hapus_komentar/$1');
$routes->get('akun_saya', 'Dashboard::akun');
$routes->get('detail_toko/(:any)/(:any)', 'Dashboard::detail_toko/$1/$2');
$routes->get('toko/(:any)', 'TokoKuliner::index/$1');
$routes->get('hapus_toko/(:any)', 'TokoKuliner::hapus/$1');
$routes->add('tambah_toko', 'TokoKuliner::tambah');
$routes->add('registrasi_user', 'UserLogin::simpan_registrasi');

#################### admin route ###############
$routes->get('home', 'Home::index', $filter);
$routes->get('event', 'Acara::index', $filter);
$routes->add('update_booking', 'Booking::update_booking', $filter);
$routes->get('kategori', 'Kategori::index', $filter);
$routes->get('login', 'User::login');
$routes->get('logout', 'User::logout');
$routes->get('kategori_acara', 'Kategori_acara::index', $filter);
$routes->get('peta', 'Peta::index', $filter);
$routes->get('data_penginapan', 'Penginapan::index', $filter);
$routes->get('persebaran_peta', 'Peta::persebaran_peta', $filter);
$routes->get('tambah_peta', 'Peta::tambah_peta', $filter);
$routes->get('edit_peta/(:num)', 'Peta::edit_peta/$1', $filter);
$routes->add('add_kategori', 'Kategori::add_kategori', $filter);
$routes->add('add_kategori_acara', 'Kategori_acara::add_kategori_acara', $filter);
$routes->add('edit_kategori_acara', 'Kategori_acara::edit_kategori_acara', $filter);
$routes->add('edit_kategori', 'Kategori::edit_kategori', $filter);
$routes->get('data_kuliner', 'Kuliner::index', $filter);
$routes->add('tambah_kuliner', 'Kuliner::tambah_kuliner', $filter);
$routes->add('edit_kuliner', 'Kuliner::edit_kuliner', $filter);
$routes->get('hapus_kuliner/(:num)', 'Kuliner::hapus_kuliner/$1', $filter);
$routes->get('feedback', 'Feedback::index', $filter);
$routes->get('delete_feedback/(:num)', 'Feedback::delete_feedback/$1', $filter);
$routes->add('tambah_penginapan', 'Penginapan::tambah_penginapan', $filter);
$routes->get('add_penginapan', 'Penginapan::add_penginapan', $filter);
$routes->add('edit_penginapan', 'Penginapan::edit_penginapan', $filter);
$routes->get('rubah_penginapan/(:any)', 'Penginapan::rubah_penginapan/$1', $filter);
$routes->get('hapus_penginapan/(:num)', 'Penginapan::hapus_penginapan/$1', $filter);
$routes->add('simpan_peta', 'Peta::simpan_peta', $filter);
$routes->add('tambah_acara', 'Acara::tambah_acara', $filter);
$routes->add('edit_acara', 'Acara::edit_acara', $filter);
$routes->add('rubah_peta/(:num)', 'Peta::rubah_peta/$1', $filter);
$routes->get('delete_kategori/(:num)', 'Kategori::delete_kategori/$1', $filter);
$routes->get('delete_kategori_acara/(:num)', 'Kategori_acara::delete_kategori_acara/$1', $filter);
$routes->get('hapus_acara/(:num)', 'Acara::hapus_acara/$1', $filter);
$routes->get('delete_peta/(:num)', 'Peta::delete_peta/$1', $filter);
$routes->get('all_album_peta', 'Peta::all_album_peta', $filter);
$routes->get('detail_album_peta/(:any)', 'Peta::detail_album_peta/$1', $filter);
$routes->get('hapus_album_peta/(:any)', 'Peta::hapus_album_peta/$1', $filter);
$routes->add('simpan_album_peta', 'Peta::simpan_album_peta', $filter);
$routes->get('all_album_acara', 'Acara::all_album_acara', $filter);
$routes->get('detail_album_acara/(:any)', 'Acara::detail_album_acara/$1', $filter);
$routes->get('hapus_album_acara/(:any)', 'Acara::hapus_album_acara/$1', $filter);
$routes->add('simpan_album_acara', 'Acara::simpan_album_acara', $filter);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
