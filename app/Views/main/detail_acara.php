<?php echo $this->extend('main/template/head') ?>
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
<section id="blog" class="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 entries">
                <article class="entry entry-single">
                    <div class="entry-img">
                        <img src="<?= base_url() ?>/acara/<?= $acara->gambar_acara ?>" alt="" class="img-fluid">
                    </div>
                    <h2 class="entry-title">
                        <a href="#"><?= $acara->nama_tempat ?></a>
                    </h2>
                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="#"><time datetime="<?= $acara->tanggal_acara ?>"><?= tgl_indo($acara->tanggal_acara);  ?></time></a></li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        <p>
                            <?= $acara->deskripsi_acara ?>.
                        </p>
                    </div>
                    Album Acara
                    <hr>
                    <div class="row">
                        <?php foreach ($album as $w) { ?>
                            <div class="col-lg-13 col-md-6">
                                <img src="<?= base_url() ?>/acara/album/<?= $w->gambar ?>" class="img-fluid" alt="">
                            </div>
                        <?php } ?>
                    </div>
                </article>
            </div>

            <div class="col-lg-4">
                <div class="sidebar">
                    <h3 class="sidebar-title">Kategori </h3>
                    <div class="sidebar-item categories">
                        <ul>
                            <?php foreach ($kategori_acara as $k) { ?>
                                <li><a href="<?= base_url('kategori_acara/' .  $k->slug) ?>"><?= $k->kategori_acara ?> <span><?= $k->jml_kat ?></span></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <hr>
                    <h3 class="sidebar-title">Berdasarkan Waktu</h3>
                    <div class="sidebar-item categories">
                        <ul>
                            <li><a href="<?= base_url('kategori_acara_lalu') ?>">Sudah Berlalu <span><?= count($acara_lalu) ?></span></a></li>
                            <li><a href="<?= base_url('kategori_acara_kini') ?>">Belum/Sedang Berlangsung <span><?= count($acara_kini) ?></span></a></li>
                        </ul>
                    </div>
                    <h3 class="sidebar-item recent-post"></h3>
                    <div class="elfsight-app-f2f867b1-55bc-42d7-b2bb-a23d07fcbc9b"></div>
                    <script src="https://apps.elfsight.com/p/platform.js" defer></script>

                    <h3 class="sidebar-title">Postingan Terakhir</h3>
                    <div class="sidebar-item recent-posts">
                        <?php foreach ($recent as $re) { ?>
                            <div class="post-item clearfix">
                                <img src="<?= base_url() ?>/acara/<?= $re['gambar_acara'] ?>" alt="">
                                <h4><a href="<?= base_url('detail_acara/' . $re['slug_acara']) ?>"><?= substr($re['nama_tempat'], 0, 15) ?></a></h4>
                            </div>
                        <?php } ?>
                    </div><!-- End sidebar recent posts-->
                </div><!-- End sidebar -->
            </div><!-- End blog sidebar -->
        </div>
    </div>
</section>

<?php echo $this->endSection() ?>