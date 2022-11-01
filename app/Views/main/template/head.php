<?php $request = \Config\Services::request();

use App\Models\PariwisataModel;
use App\Models\ModelAcara;

$this->PariwisataModel = new PariwisataModel();
$menu =  $this->PariwisataModel->get_wisata_count();
$this->ModelAcara = new ModelAcara();
$menu_acara =  $this->ModelAcara->get_kat_acara_count();




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Sistem Informasi Geografis Kabupaten Lamongan, Jawa timur" />
    <meta name="keywords" content="Sistem Informasi Geografis Lamongan" />
    <meta name="author" content="devaltiquery" />
    <link rel="icon" href="<?= base_url() ?>/bn/assets/images/favicon.ico" type="image/x-icon">

    <title>Explore Lamongan | <?= $title ?></title>

    <!-- Favicons -->
    <link href="<?= base_url() ?>/fn/assets/img/favicon.png" rel="icon">
    <link href="<?= base_url() ?>/fn/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>/fn/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/fn/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/fn/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/fn/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/fn/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>/fn/assets/vendor/owl.carousel/<?= base_url() ?>/fn/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/fn/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url() ?>/fn/assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>/fn/assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <?php echo $this->renderSection('head') ?>

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top topbar-inner-pages">
        <div class="container d-flex align-items-center">
            <div class="contact-info mr-auto">
                <ul>
                    <li><i class="icofont-envelope"></i><a href="mailto:contact@example.com">Indraayudya83@gmail.com</a></li>
                    <li><i class="icofont-instagram"></i><a href="https://www.instagram.com/explorelamongan/">@Explorelamongan </a></li>
                    <li><i class="icofont-brand-whatsapp"></i><a href="https://wa.wizard.id/3a3018" target="_blank">+62 823-3650-5995</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><a href="<?= base_url() ?>" class="scrollto">Explore Lamongan</a></h1>
            <nav class="nav-menu d-none d-lg-block">
                <?php $segments = $request->uri->getSegment(1); ?>
                <ul>
                    <li class="<?php if ($segments == "" || $segments == "dashboard") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('/') ?>">Beranda</a></li>
                    <li class="drop-down  <?php if ($segments == "view_destinasi" || $segments == "detail_destinasi" || $segments == "kategori_destinasi") {
                                                echo "active";
                                            } ?>">
                        <a href="<?= base_url('view_destinasi') ?>">Destinasi </a>
                        <ul>
                            <?php
                            foreach ($menu as $m) { ?>
                                <li>
                                    <a href="<?= base_url('kategori_destinasi/' . $m->slug) ?> "><?= $m->nama_kategori ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="drop-down  <?php if ($segments == "view_acara" || $segments == "detail_acara" || $segments == "kategori_acara") {
                                                echo "active";
                                            } ?>">
                        <a href="<?= base_url('view_acara') ?>">Acara </a>
                        <ul>
                            <?php
                            foreach ($menu_acara as $ma) { ?>
                                <li>
                                    <a href="<?= base_url('kategori_acara/' . $ma->slug) ?> "><?= $ma->kategori_acara ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>

                    <li class="<?php if ($segments == "view_kuliner" || $segments == "detail_kuliner") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('view_kuliner') ?>">Kuliner</a></li>
                    <li class="<?php if ($segments == "view_penginapan" || $segments == "detail_penginapan") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('view_penginapan') ?>">Penginapan</a></li>
                    <li class=" <?php if ($segments == "view_pariwisata") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('view_pariwisata') ?>">Peta Wisata</a></li>

                    <?php if (empty(session()->get('status'))) { ?>
                        <li class=" <?php if ($segments == "login_user") {
                                        echo "active";
                                    } ?>"> <a href="<?= base_url('login_user') ?>">Login</a>
                        </li>
                    <?php } else { ?>
                        <li class="drop-down"><a href="#">Akun</a>
                            <ul>
                                <li><a href="<?= base_url('akun_saya') ?>">Akun Saya</a></li>
                                <li><a href="<?= base_url('logout_user') ?>">Logout</a></li>
                            </ul>
                        </li>
                    <?php  } ?>

                </ul>

            </nav><!-- .nav-menu -->
        </div>
    </header><!-- End Header -->

    <!-- ######################################### -->
    <!--                Boleh diedit               -->
    <!-- ######################################### -->
    <?php if ($request->uri->getSegment(1) == "" || $request->uri->getSegment(1) == "dashboard") { ?>
        <section id="hero" class="d-flex justify-cntent-center align-items-center">
            <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">
                <div class="carousel-item active">
                    <div class="carousel-container">
                        <h2 class=".">Selamat Datang Di <span>Explore Lamongan</span></h2>
                        <p class="animate__animated animate__fadeInUp">Sebuah website sistem informasi geografis pariwisata kabupaten Lamongan.
                            Website ini dibuat untuk mempublikasikan destinasi wisata beserta hal-hal terkait dengan wisata yang ada pada
                            kabupaten Lamongan.</p>
                    </div>
                </div>
            </div>
        </section>
        <h2><?= $title ?></h2>
    <?php } ?>

    <!-- ######################################### -->
    <!--               Batas Boleh diedit               -->
    <!-- ######################################### -->
    <main id="main">

        <?php echo $this->renderSection('content') ?>
    </main>
    <?= $this->include('main/template/footer') ?>