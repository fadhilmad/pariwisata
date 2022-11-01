<?php echo $this->extend('main/template/head') ?>


<?php echo $this->section('content') ?>
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
                        <img src="<?= base_url() ?>/penginapan/<?= $penginapan->gambar ?>" alt="" class="img-fluid">
                    </div>
                    <h2 class="entry-title">
                        <a href="#"><?= $penginapan->nama_tempat ?></a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="icofont-google-map"></i>
                                <a href="https://www.google.com/maps/dir//<?= $penginapan->latitude ?>,
                            <?= $penginapan->longitude ?>/" target="_blank"><?= $penginapan->lokasi_tempat ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        <p>
                            <?= $penginapan->deskripsi_tempat ?>.
                        </p>
                    </div>
                </article>
            </div><!-- End blog entries list -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="elfsight-app-0db3bfc4-16bd-44d1-badf-ca6f9c9a6339"></div>
                    <script src="https://apps.elfsight.com/p/platform.js" defer></script>

                    <h3 class="sidebar-title">Postingan Terakhir</h3>
                    <div class="sidebar-item recent-posts">
                        <?php foreach ($recent as $re) { ?>
                            <div class="post-item clearfix">
                                <img src="<?= base_url() ?>/penginapan/<?= $re['gambar'] ?>" alt="">
                                <h4><a href="<?= base_url('detail_penginapan/' . $re['slug']) ?>"><?= substr($re['nama_tempat'], 0, 15) ?></a></h4>
                            </div>
                        <?php } ?>
                    </div><!-- End sidebar recent posts-->
                </div><!-- End sidebar -->

            </div><!-- End blog sidebar -->

        </div>

    </div>
</section><!-- End Blog Section -->
<?php echo $this->endSection() ?>