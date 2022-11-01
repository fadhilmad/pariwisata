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
<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2><?= $title ?></h2>
            <?php
            if (session()->getFlashdata('flash')) {
                echo '<p></p>';
                echo '<div class="text-capitalize alert mt-2 alert-sm alert-' . session()->getFlashdata('flash')['jenis'] . '">';
                echo session()->getFlashdata('flash')['message'];
                echo '<a href="#" class="alert-link "></a>.</div>';
                echo '<p></p>';
            }
            ?>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="<?= base_url('UserLogin/login_user_validasi') ?>" method="post">
                    <div role="form" class="php-email-form">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Masukkan Email yang valid" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="name" placeholder="Password" data-msg="jangan kosongkan password" />
                            <div class="validate"></div>
                        </div>
                        <div>
                            <span><small>Sudah punya akun? <a href="#registrasi" data-toggle="modal">Registrasi</a> </small></span>
                        </div>
                        <div class="text-center"><button class="btn btn-success" type="submit">Login</button></div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section><!-- End Services Section -->

<!-- Modal -->
<div class="modal fade" id="registrasi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrasi</h5>
            </div>
            <form action="<?= base_url('registrasi_user') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="example@mail.com">
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="ex: Indra Ayudya">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php echo $this->endSection() ?>