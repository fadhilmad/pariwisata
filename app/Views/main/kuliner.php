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
            <h3 class="text-capitalize ">Kuliner </h3>
        </div>
        <div class="row">
            <?php foreach ($kuliner as $k) { ?>
                <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                    <article class="entry">

                        <div class="entry-img">
                            <img src="<?= base_url() ?>/kuliner/<?= $k->gambar_kuliner ?>" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="#"><?= $k->nama_kuliner ?></a>
                        </h2>

                        <div class="entry-content">
                            <p>
                                <?= substr($k->deskripsi_kuliner, 0, 100) ?> ..
                            </p>
                            <div class="read-more">
                                <a href="<?= base_url('detail_kuliner/' . $k->slug) ?>">Baca Selengkapnya</a>
                            </div>
                        </div>

                    </article><!-- End blog entry -->
                </div>
            <?php } ?>
        </div>
    </div>

</section>

<?php echo $this->endSection() ?>