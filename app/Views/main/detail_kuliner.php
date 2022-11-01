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
                        <img src="<?= base_url() ?>/kuliner/<?= $kuliner->gambar_kuliner ?>" alt="" class="img-fluid">
                    </div>
                    <h2 class="entry-title">
                        <a href="#"><?= $kuliner->nama_kuliner ?></a>
                    </h2>

                    <div class="entry-content">
                        <p>
                            <?= $kuliner->deskripsi_kuliner ?>.
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
                                <img src="<?= base_url() ?>/kuliner/<?= $re['gambar_kuliner'] ?>" alt="">
                                <h4><a href="<?= base_url('detail_kuliner/' . $re['slug']) ?>"><?= substr($re['nama_kuliner'], 0, 15) ?></a></h4>
                            </div>
                        <?php } ?>
                    </div>
                    <h3 class="sidebar-title">Daftar Toko Terkait</h3>
                    <div class="sidebar-item recent-posts">
                        <?php foreach ($toko as $re) { ?>
                            <div class="post-item clearfix">
                                <img src="<?= base_url() ?>/kuliner/toko/<?= $re->foto ?>" alt="">
                                <h4><a href=" <?= base_url('detail_toko/' .  $re->slug . '/' . $re->slug_toko)  ?>"><?= substr($re->nama_toko, 0, 15) ?></a></h4>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- End sidebar recent posts-->
                </div><!-- End sidebar -->

            </div><!-- End blog sidebar -->

        </div>

    </div>
</section><!-- End Blog Section -->
<?php echo $this->endSection() ?>