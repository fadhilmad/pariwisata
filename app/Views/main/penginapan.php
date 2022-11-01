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
    <div class="container " data-aos="fade-up">
        <div class=" text-left text-black">
            <h3 class="text-capitalize "><?= $title ?> </h3>
        </div>
        <div class="row">
            <?php foreach ($penginapan as $p) { ?>
                <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                    <article class="entry">
                        <div class="entry-img">
                            <img src="<?= base_url() ?>/penginapan/<?= $p->gambar ?>" alt="" class="img-fluid">
                        </div>
                        <h2 class="entry-title">
                            <a href="#"><?= $p->nama_tempat ?></a>
                        </h2>
                        <div class="entry-content">
                            <p>
                                <?= substr($p->deskripsi_tempat, 0, 100) ?> ..
                            </p>
                            <div class="read-more">
                                <a href="<?= base_url('detail_penginapan/' . $p->slug) ?>">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </article><!-- End blog entry -->
                </div>
            <?php } ?>
        </div>
    </div>

</section>

<?php echo $this->endSection() ?>