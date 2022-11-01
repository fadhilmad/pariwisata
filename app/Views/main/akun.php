<?php echo $this->extend('main/template/head') ?>
<?php echo $this->section('head') ?>
<style>
    .imgg {
        border: 1px solid #ddd;
        /* Gray border */
        border-radius: 4px;
        /* Rounded border */
        padding: 5px;
        /* Some padding */
        width: 100px;
        /* Set a small width */
    }

    /* Add a hover effect (blue shadow) */
    .imgg:hover {
        box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
    }
</style>
<?php echo $this->endSection() ?>
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
        <div class="card">
            <!-- /.card-header -->
            <div class="card-header">
                Daftar Bookingan Anda
            </div>
            <div class="card-body table-responsive p-0">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5%'>No</th>
                            <th>Nama Tempat</th>
                            <th>Tanggal </th>
                            <th>Gambar </th>
                            <th>Status </th>
                            <th>Status Bayar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no  = 1;
                        foreach ($booking_acara as $a) {
                            if ($a->status == 'menunggu') {
                                $warna = 'secondary';
                                $icon = 'clock-o';
                            } else if ($a->status == 'diterima') {
                                $warna = 'info';
                                $icon = 'check';
                            } else if ($a->status == 'ditolak') {
                                $warna = 'danger';
                                $icon = 'ban';
                            } else {
                                $warna = 'success';
                                $icon = 'check';
                            }
                            if ($a->bukti_bayar == '') {
                                $warna_bayar = 'secondary';
                                $icon_bayar = 'clock-o';
                                $text = 'belum bayar';
                            } else {
                                $warna_bayar = 'success';
                                $icon_bayar = 'check';
                                $text = 'sudah bayar';
                            }
                        ?>

                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $a->nama_tempat ?></td>
                                <td><?= $a->tanggal_acara ?></td>
                                <td><img class="imgg" src="<?= base_url() . "/acara/booking/" . $a->gambar_acara  ?>"> </td>
                                <td><button class="btn btn-sm btn-<?= $warna ?>"> <i class="fa fa-<?= $icon ?>"> <?= $a->status ?> </i></button> </td>
                                <td><button class="btn btn-sm btn-<?= $warna_bayar ?>"> <i class="fa fa-<?= $icon_bayar ?>"> <?= $text ?> </i></button> </td>
                                <td>

                                    <div class="dropdown">
                                        <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" data-target="#lihat<?= $a->id_booking ?>" data-toggle="modal">Lihat Detail</a>
                                            <?php
                                            if ($a->status == 'diterima') { ?>
                                                <a class="dropdown-item" data-target="#edit<?= $a->id_booking ?>" data-toggle="modal">Upload Bukti Pembayaran</a>
                                            <?php  }
                                            ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php foreach ($booking_acara as  $a) { ?>
    <div class="modal fade" id="edit<?= $a->id_booking ?>" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card">
                    <br>
                    <h3 class="text-center ">Validasi Booking Acara</h3>
                    <div class="card-body mx-2">

                        <?= form_open_multipart(base_url('bayar_booking')); ?>
                        <input type="hidden" name="id_booking" value="<?= $a->id_booking ?>">
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Bukti Pembayaran</label>
                            <div class="col-sm-9">
                                <input type="file" name="bukti_bayar" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Preview Bukti Pembayaran</label>
                            <?php
                            if (!empty($a->bukti_bayar)) { ?>
                                <div class="col-sm-9">
                                    <img src="<?= base_url('/acara/booking/bukti_bayar/' . $a->bukti_bayar) ?>" alt="" id="gambar_load" width="300px">
                                </div>
                            <?php

                            } else {
                                echo "Pembooking Belum mengirim bukti pembayaran";
                            }
                            ?>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9 ">
                                <?php
                                if (empty($a->bukti_bayar)) { ?>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                <?php
                                }
                                ?>
                                <button type="reset" class="btn btn-warning">Batal</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php foreach ($booking_acara as  $a) { ?>
    <div class="modal fade" id="lihat<?= $a->id_booking ?>" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card">
                    <br>
                    <h3 class="text-center ">Validasi Booking Acara</h3>
                    <div class="card-body mx-2">


                        <input type="hidden" name="id_booking" value="<?= $a->id_booking ?>">
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Validasi</label>
                            <div class="col-sm-9">
                                <select name="status" class="form-control" required>
                                    <option value=""><?= $a->status ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Catatan</label>
                            <div class="col-sm-9">
                                <textarea name="catatan" id="" cols="30" rows="5" class="form-control"> <?= $a->catatan ?> </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9 ">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php echo $this->endSection() ?>