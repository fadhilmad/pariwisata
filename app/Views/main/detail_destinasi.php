<?php echo $this->extend('main/template/head') ?>

<?php echo $this->section('head') ?>
<!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet"> -->
<link href="<?= base_url() ?>/fn/custom.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" /> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script> -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="<?= base_url() ?>/fn/rating/css/star-rating.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="<?= base_url() ?>/fn/rating/js/star-rating.js"></script>
<script src="<?= base_url() ?>/fn/rating/themes/krajee-gly/theme.js" type="text/javascript"></script>
<style>
    .rating2 {
        display: inherit;
        justify-content: inherit;
        flex-direction: inherit;
    }

    .rating2>input {
        display: none;
    }

    .rating {
        display: none;
    }

    .rating2>label:checked {
        color: black;
    }

    .rating2>input:checked~label {
        color: black;
    }
</style>

<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>
<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<section id="breadcrumbs" class="breadcrumbs ">
    <div class="container text-right">
        <ol>
            <li><a href="<?= base_url() ?>">Beranda</a></li>
            <li><?= $title ?></li>
        </ol>
    </div>
</section>
<?php
if (session()->getFlashdata('flash')) {
    echo '<p></p>';
    echo '<div class="text-capitalize alert mt-2 alert-sm alert-' . session()->getFlashdata('flash')['jenis'] . '">';
    echo session()->getFlashdata('flash')['message'];
    echo '<a href="#" class="alert-link "></a>.</div>';
    echo '<p></p>';
}
?>
<section id="blog" class="blog">
    <div class="container">

        <div class="row">

            <div class="col-lg-8 entries">

                <article class="entry entry-single">

                    <div class="entry-img">
                        <img src="<?= base_url() ?>/images/<?= $pariwisata->gambar_pariwisata ?>" alt="" class="img-fluid">
                    </div>
                    <h2 class="entry-title">
                        <a href="#"><?= $pariwisata->nama_pariwisata ?></a>
                    </h2>
                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="icofont-google-map"></i>
                                <a href="https://www.google.com/maps/dir//<?= $pariwisata->latitude ?>,
                            <?= $pariwisata->longitude ?>/" target="_blank"><?= $pariwisata->lokasi_pariwisata ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        <p>
                            <?= $pariwisata->deskripsi_pariwisata ?>.
                        </p>

                    </div>

                    <section id="portfolio" class="portfoio">
                        <div class="container" data-aos="fade-up">
                            <div class="section-title">
                                <h2 class="text-center text-primary"> Album Wisata</h2>
                            </div>
                            <div class="row portfolio-container">
                                <?php foreach ($album as $w) { ?>
                                    <div class="col-lg-3 col-md-6  portfolio-item filter-app">
                                        <img src="<?= base_url() ?>/images/album/<?= $w->gambar ?>" class="img-fluid" alt="">
                                        <div class="portfolio-info">
                                            <p><?= $w->nama ?></p>
                                            <a href="<?= base_url() ?>/images/album/<?= $w->gambar ?>" data-gall="portfolioGallery" class="venobox preview-link" title="<?= $w->nama ?>"><i class="bx bx-search"></i></a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </section>
                </article>

                <!-- bagian awal komentar  -->
                <div class="blog-comments">
                    <h4 class="comments-count">Komentar</h4>
                    <?php foreach ($komentar as $k) { ?>
                        <div id="comment-1" class="comment clearfix">
                            <img src="<?= base_url() ?>/default.png" class="comment-img  float-left" alt="">
                            <h5><a href="#"><?= $k->nama ?>

                                    <?php if (session()->get('status') == 'user') {
                                        if (session()->get('id_user') == $k->id_user) { ?>
                                            <a href="<?= base_url('hapus_komentar/' . $k->id_komentar) ?>" class="reply "><i class="icofont-trash"></i> Hapus</a>
                                    <?php }
                                    } ?>
                                </a>
                            </h5>
                            <time datetime="2020-01-01"><?= tgl_indo($k->tanggal) ?></time>

                            <p>
                                <?= $k->isi ?>
                            </p>
                            <div class="rating2">
                                <?php
                                for ($i = 0; $i < 5; $i++) {
                                    if (($i + 1 <= $k->rating)) { ?>
                                        <input class="rating2" type="radio" name="rating" checked value="4"><label for="5">☆</label>
                                <?php  }
                                }
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (session()->get('status') == 'user') { ?>
                        <div class="reply-form">
                            <h4>Tinggalkan Komentar</h4>
                            <form action="<?= base_url('isi_komentar') ?>" method="post">
                                <div class="row">
                                    <input name="id_pariwisata" type="hidden" value="<?= $pariwisata->id_pariwisata ?>">
                                    <input name="id_user" type="hidden" value="<?= session()->get('id_user') ?>">
                                    <div class="col form-group">
                                        <textarea name="comment" class="form-control" placeholder="Your Comment*" required></textarea>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <input type="text" name="input-1" class="rating rating-loading" value="0" data-size="md" data-step="1" data-theme="krajee-gly" title="">
                                    <!-- <input required id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="0"> -->
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                            </form>
                        </div>
                    <?php } ?>
                </div>
                <!-- bagian akhir komentar  -->

            </div><!-- End blog entries list -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <h3 class="sidebar-title">Kategori</h3>
                    <div class="sidebar-item categories">
                        <ul>
                            <?php foreach ($kategori as $k) { ?>
                                <li><a href="<?= base_url('kategori_destinasi/' .  $k->slug) ?>"><?= $k->nama_kategori ?> <span><?= $k->jml_kat ?></span></a></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <h3 class="sidebar-item recent-post"></h3>
                    <div class="elfsight-app-f2f867b1-55bc-42d7-b2bb-a23d07fcbc9b"></div>
                    <script src="https://apps.elfsight.com/p/platform.js" defer></script>

                    <h3 class="sidebar-title">Postingan Terakhir</h3>
                    <div class="sidebar-item recent-posts">
                        <?php foreach ($recent as $re) { ?>
                            <div class="post-item clearfix">
                                <img src="<?= base_url() ?>/images/<?= $re['gambar_pariwisata'] ?>" alt="">
                                <h4><a href="<?= base_url('detail_destinasi/' . $re['slug_pariwisata']) ?>"><?= substr($re['nama_pariwisata'], 0, 15) ?></a></h4>
                            </div>
                        <?php } ?>
                    </div><!-- End sidebar recent posts-->
                </div><!-- End sidebar -->

            </div><!-- End blog sidebar -->

        </div>

    </div>
</section>

<?php echo $this->endSection() ?>


<?php echo $this->section('foot') ?>
<script>
    $(document).ready(function() {
        $('#rateMe1').mdbRate();
    });
</script>
<?php echo $this->endSection() ?>