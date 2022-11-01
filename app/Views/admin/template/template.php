<?php $request = \Config\Services::request();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIG Pariwisata Lamongan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Sistem Informasi Geografis Kabupaten Lamongan, Jawa timur" />
    <meta name="keywords" content="Sistem Informasi Geografis Lamongan" />
    <meta name="author" content="Indra Ayudya Dwi Prasetya" />
    <link rel="icon" href="<?= base_url() ?>/bn/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>/bn/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bn/assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bn/assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bn/assets/icon/icofont/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bn/assets/icon/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bn/assets/pages/notification/notification.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bn/assets/css/animate.css/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bn/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bn/assets/css/jquery.mCustomScrollbar.css">
    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/jquery/jquery.min.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/popper.js/popper.min.js"></script>
    <?php echo $this->renderSection('head') ?>
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search waves-effect waves-light">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url() ?>">
                            <img class="img-fluid" src="<?= base_url() ?>/bn/assets/images/logo-new.png" alt="Theme-Logo" />
                        </a>

                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-80 img-radius" src="<?= base_url() ?>/bn/assets/images/avatar-4.jpg" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details">Indra Ayudya<i class="fa fa-caret-down"></i></span>
                                    </div>
                                </div>
                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                                            <a href="#!"><i class="ti-settings"></i>Settings</a>
                                            <a href="<?= base_url('logout') ?>"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Home</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class=" <?php if ($request->uri->getSegment(1) == "" || $request->uri->getSegment(1) == "home") {
                                                echo "active";
                                            } ?> ">
                                    <a href="<?= base_url('home') ?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php if ($request->uri->getSegment(1) == "kategori") {
                                                echo "active";
                                            } ?>  ">
                                    <a href="<?= base_url('kategori') ?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-menu-alt"></i><b>K</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Kategori Destinasi</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <!-- active pcoded-trigger  -->
                                <li class="pcoded-hasmenu <?php if ($request->uri->getSegment(1) == "peta" || $request->uri->getSegment(1) == "tambah_peta" || $request->uri->getSegment(1) == "edit_peta" || $request->uri->getSegment(1) == "persebaran_peta" || $request->uri->getSegment(1) == "all_album_peta" || $request->uri->getSegment(1) == "detail_album_peta") {
                                                                echo "active pcoded-trigger";
                                                            } ?> ">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-direction-alt "></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Destinasi</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="<?php if ($request->uri->getSegment(1) == "tambah_peta") {
                                                        echo "active";
                                                    } ?> ">
                                            <a href="<?= base_url('tambah_peta') ?> " class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Tambah Destinasi</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if ($request->uri->getSegment(1) == "peta"  || $request->uri->getSegment(1) == "edit_peta") {
                                                        echo "active";
                                                    } ?> ">
                                            <a href="<?= base_url('peta') ?> " class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Daftar Destinasi</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if ($request->uri->getSegment(1) == "persebaran_peta") {
                                                        echo "active";
                                                    } ?> ">
                                            <a href="<?= base_url('persebaran_peta') ?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Peta Persebaran</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if ($request->uri->getSegment(1) == "all_album_peta"  || $request->uri->getSegment(1) == "detail_album_peta") {
                                                        echo "active";
                                                    } ?> ">
                                            <a href="<?= base_url('all_album_peta') ?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Album Pariwisata</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu <?php if ($request->uri->getSegment(1) == "kategori_acara" || $request->uri->getSegment(1) == "event" || $request->uri->getSegment(1) == "all_album_acara" || $request->uri->getSegment(1) == "detail_album_acara" || $request->uri->getSegment(1) == "booking") {
                                                                echo "active pcoded-trigger";
                                                            } ?> ">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-announcement"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Acara</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="<?php if ($request->uri->getSegment(1) == "kategori_acara") {
                                                        echo "active";
                                                    } ?> ">
                                            <a href="<?= base_url('kategori_acara') ?> " class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>K</b></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Kategori Acara</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if ($request->uri->getSegment(1) == "event") {
                                                        echo "active";
                                                    } ?> ">
                                            <a href="<?= base_url('event') ?> " class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-harddrives"></i><b>A</b></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Daftar Acara</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if ($request->uri->getSegment(1) == "booking") {
                                                        echo "active";
                                                    } ?> ">
                                            <a href="<?= base_url('booking') ?> " class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-harddrives"></i><b>A</b></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Daftar Booking Acara</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if ($request->uri->getSegment(1) == "all_album_acara" || $request->uri->getSegment(1) == "detail_album_acara") {
                                                        echo "active";
                                                    } ?> ">
                                            <a href="<?= base_url('all_album_acara') ?> " class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-harddrives"></i><b>A</b></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Album Acara</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class=" <?php if ($request->uri->getSegment(1) == "data_kuliner" || $request->uri->getSegment(1) == "toko") {
                                                echo "active";
                                            } ?> ">
                                    <a href="<?= base_url('data_kuliner') ?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-shopping-cart"></i><b>K</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Kuliner</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu <?php if ($request->uri->getSegment(1) == "data_penginapan" || $request->uri->getSegment(1) == "add_penginapan" || $request->uri->getSegment(1) == "rubah_penginapan") {
                                                                echo "active pcoded-trigger";
                                                            } ?> ">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-map"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Penginapan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="<?php if ($request->uri->getSegment(1) == "add_penginapan") {
                                                        echo "active";
                                                    } ?> ">
                                            <a href="<?= base_url('add_penginapan') ?> " class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>K</b></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Tambah Penginapan</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php if ($request->uri->getSegment(1) == "data_penginapan") {
                                                        echo "active";
                                                    } ?> ">
                                            <a href="<?= base_url('data_penginapan') ?> " class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-harddrives"></i><b>A</b></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Daftar Penginapan</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>


                                    </ul>
                                </li>
                                <li class=" ">
                                    <a href="<?= base_url('feedback') ?>" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-email"></i><b>P</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Pesan Masuk</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10"><?= $title ?></h5>
                                            <p class="m-b-0"><?= $sub_title ?></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- task, page, download counter  start -->
                                        <?php echo $this->renderSection('content') ?>
                                        <!--  project and team member end -->
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Required Jquery -->

    <!-- waves js -->
    <script src="<?= base_url() ?>/bn/assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <!-- slimscroll js -->
    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/SmoothScroll.js"></script>
    <script src="<?= base_url() ?>/bn/assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <!-- <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="<?= base_url() ?>/bn/assets/pages/widget/amchart/gauge.js"></script>
    <script src="<?= base_url() ?>/bn/assets/pages/widget/amchart/serial.js"></script>
    <script src="<?= base_url() ?>/bn/assets/pages/widget/amchart/light.js"></script>
    <script src="<?= base_url() ?>/bn/assets/pages/widget/amchart/pie.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script> -->
    <!-- menu js -->
    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/bootstrap-growl.min.js"></script>
    <script src="<?= base_url() ?>/bn/assets/js/pcoded.min.js"></script>
    <script src="<?= base_url() ?>/bn/assets/js/vertical-layout.min.js "></script>
    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/script.js "></script>

    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/bootstrap/js/bootstrap.min.js "></script>
    <?php echo $this->renderSection('script') ?>
    <script type="text/javascript">
        <?php if (session()->getFlashdata("flash")) { ?>

            function notify() {
                $.growl({
                    icon: '<?= session()->getFlashdata("flash")['icon'] ?>',
                    message: ' <?= session()->getFlashdata("flash")['message'] ?>',
                }, {
                    element: 'body',
                    type: '<?= session()->getFlashdata("flash")['jenis'] ?>',
                    allow_dismiss: true,
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    },
                    delay: 3500,
                    mouse_over: false,
                    icon_type: 'class',
                    template: '<div data-growl="container" class="alert" role="alert">' +
                        '<button type="button" class="close" data-growl="dismiss">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '<span class="sr-only">Close</span>' +
                        '</button>' +
                        '<span data-growl="icon"></span>' +
                        '<span data-growl="message"></span>' +
                        '<a href="#" data-growl="url"></a>' +
                        '</div>'
                });
            };
            notify();
        <?php } ?>
    </script>
</body>

</html>