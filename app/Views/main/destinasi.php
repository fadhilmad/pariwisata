<?php echo $this->extend('main/template/head') ?>

<?php echo $this->section('head') ?>
<?php echo $this->section('head') ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/slider/vendor/slick/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/slider/vendor/lightbox2/css/lightbox.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/slider/css/util.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/slider/css/main.css">

<?php echo $this->endSection() ?>
<?php echo $this->endSection('head') ?>
<?php echo $this->section('content') ?>

<!-- ######################################### -->
<!--                Boleh diedit               -->
<!-- ######################################### -->
<section class="slide1">
    <div class="wrap-slick1">
        <div class="slick1">
            <div class="item-slick1 item1-slick1" style="background-image: url(<?php echo base_url() ?>/slider/images/banner-1.jpg);">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
                    </span>
                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                        Wisata Bahari Lamongan
                    </h2>
                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                        <!-- Button -->
                        <a href="http://localhost:8080/detail_destinasi/73" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Buka
                        </a>
                    </div>
                </div>
            </div>

            <div class="item-slick1 item2-slick1" style="background-image: url(<?php echo base_url() ?>/slider/images/banner-2.jpg);">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
                    </span>
                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                        Pantai Putri Klayar
                    </h2>
                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
                        <!-- Button -->
                        <a href="http://localhost:8080/detail_destinasi/46" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Buka
                        </a>
                    </div>
                </div>
            </div>

            <div class="item-slick1 item3-slick1" style="background-image: url(<?php echo base_url() ?>/slider/images/banner-3.jpg);">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
                    </span>
                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                        Wego Lamongan
                    </h2>
                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
                        <!-- Button -->
                        <a href="http://localhost:8080/detail_destinasi/70" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Buka
                        </a>
                    </div>
                </div>
            </div>

            <div class="item-slick1 item3-slick1" style="background-image: url(<?php echo base_url() ?>/slider/images/kutang.jpg);">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
                    </span>
                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                        Pantai Kutang
                    </h2>
                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
                        <!-- Button -->
                        <a href="http://localhost:8080/detail_destinasi/49" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Buka
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ######################################### -->
<!--                Batas Boleh diedit         -->
<!-- ######################################### -->
<section id="blog" class="blog">
    <div class="container " data-aos="fade-up">
        <div class=" text-left text-black">
            <h3 class="text-capitalize "><?= $title ?> <?php if (!empty($kategori)) {
                                                            echo "| " . $kategori['nama_kategori'];
                                                        } ?></h3>
        </div>

        <div class="row">
            <?php foreach ($wisata as $w) { ?>
                <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                    <article class="entry">

                        <div class="entry-img">
                            <img src="<?= base_url() ?>/images/<?= $w->gambar_pariwisata ?>" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="#"><?= $w->nama_pariwisata ?></a>
                        </h2>

                        <div class="entry-content">
                            <p>
                                <?= substr($w->deskripsi_pariwisata, 0, 100) ?> ..
                            </p>
                            <div class="read-more">
                                <a href="<?= base_url('detail_destinasi/' . $w->slug_pariwisata) ?>">Baca Selengkapnya</a>
                            </div>
                        </div>

                    </article><!-- End blog entry -->
                </div>
            <?php } ?>
        </div>
    </div>

</section>

<script>
    var map = L.map('map').setView({
        lat: -7.116820542833942,
        lon: 112.33165524242588
    }, 10);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.satellite',
        accessToken: 'pk.eyJ1IjoiZ2l2YW5nIiwiYSI6ImNqeDMydHZ4NzBmaDg0OW5zbjRla3dobXIifQ.qjS0wBxXfvfxJMBB9VPd5g'
    }).addTo(map);
    <?php foreach ($wisata as $key => $value) { ?>
        L.marker([<?= $value->latitude; ?>, <?= $value->longitude; ?>], {
                color: 'red',
                fillColor: '#f03',
            }).addTo(map)
            .bindPopup(
                "Jenis Wisata : <?= $value->nama_kategori; ?></br>" +
                "Nama Wisata : <?= $value->nama_pariwisata; ?></br>" +
                "Latitude : <?= $value->latitude; ?></br> " +
                "Longitude : <?= $value->longitude; ?></br>" +
                "Lokasi : <?= substr($value->lokasi_pariwisata, 0, 20); ?>...</br>" +
                "Deskripsi : <?= substr($value->deskripsi_pariwisata, 0, 20); ?>...</br>"
            );
    <?php } ?>
</script>

<?php echo $this->endSection() ?>
<?php echo $this->section('foot') ?>

<script type="text/javascript" src="<?php echo base_url() ?>/slider/vendor/animsition/js/animsition.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/slider/vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/slider/js/slick-custom.js"></script>
<?php echo $this->endSection() ?>