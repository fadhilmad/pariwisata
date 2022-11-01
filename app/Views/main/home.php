<?php echo $this->extend('main/template/head') ?>

<?php echo $this->section('content') ?>

<section id="portfolio" class="portfoio">
    <div class="container" data-aos="fade-up">
        <div class="row portfolio-container">
            <?php foreach ($wisata as $w) { ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="<?= base_url() ?>/images/<?= $w->gambar_pariwisata ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4><?= substr($w->nama_pariwisata, 0, 15) ?></h4>
                        <p><?= substr($w->lokasi_pariwisata, 0, 15) ?></p>
                        <a href="<?= base_url() ?>/images/<?= $w->gambar_pariwisata ?>" data-gall="portfolioGallery" class="venobox preview-link" title="<?= $w->nama_pariwisata ?>"><i class="bx bx-expand"></i></a>
                        <a href="<?= base_url('detail_destinasi/' . $w->slug_pariwisata) ?>" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<section id="contact" class="contact">
    <?php
    if (session()->getFlashdata('flash')) {
        echo '<p></p>';
        echo '<div class="text-capitalize alert mt-2 alert-sm alert-' . session()->getFlashdata('flash')['jenis'] . '">';
        echo session()->getFlashdata('flash')['message'];
        echo '<a href="#" class="alert-link "></a>.</div>';
        echo '<p></p>';
    }
    ?>
    <!-- <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Hubungi Kami</h2>
        </div>

        <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

            <div class="col-lg-5">
                <div class="info">
                    <div class="address">
                        <i class="icofont-google-map"></i>
                        <h4>Location:</h4>
                        <p>Jl. Raya Babat - Lamongan</p>
                    </div>

                    <div class="email">
                        <i class="icofont-envelope"></i>
                        <h4>Email:</h4>
                        <p>indraayudya1967@gmail.com</p>
                    </div>

                    <div class="phone">
                        <i class="icofont-phone"></i>
                        <h4>Whatsapp:</h4>
                        <p>+6282336505995s</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

                <form action="<?= base_url('users_feedback') ?>" method="post">
                    <div role="form" class="php-email-form">
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama" data-rule="minlen:4" data-msg="Masukkan Nama Minimal 4 karakter" />
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Masukkan Email yang valid" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Jangan Kosongkan Pesan" placeholder="Pesan"></textarea>
                            <div class="validate"></div>
                        </div>

                        <div class="text-center"><button type="submit">Kirim Pesan</button></div>
                    </div>
                </form>
            </div>

        </div>

    </div>-->
</section>

<?php echo $this->endSection() ?>