<?php echo $this->extend('admin/template/template') ?>
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
<?php helper('form'); ?>
<div class="col-12">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <a data-target="#add_acara" data-toggle="modal"><button class="btn btn-sm btn-primary btn-round waves-effect waves-light"><i class="fa fa-plus"></i> Tambah Data</button></a>
            <p></p>
            <div class="card-body table-responsive p-0">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5%'>No</th>
                            <th>Nama Tempat</th>
                            <th>Tanggal Acara</th>
                            <th>Kategori Acara</th>
                            <th>Deskripsi Acara </th>
                            <th>Gambar </th>
                            <th width='20%'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no  = 1;
                        foreach ($acara as $a) { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $a->nama_tempat ?></td>
                                <td><?= $a->tanggal_acara ?></td>
                                <td><?= $a->kategori_acara ?></td>
                                <td><?= $a->deskripsi_acara ?></td>
                                <td><img class="imgg" src="<?= base_url() . "/acara/" . $a->gambar_acara  ?>"></td>
                                <td>
                                    <a class="btn btn-success btn-sm" data-toggle="modal" href="#edit<?= $a->id_acara   ?>"> <i class="fa fa-edit"></i> Edit </a>
                                    <a href="<?= base_url('hapus_acara/' . $a->id_acara) ?>" class="btn btn-danger btn-sm swalDefaultSuccess" onclick=" return confirm('Apakah anda yakin akan mengapus data?')"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add_acara" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card">
                <br>
                <h3 class="text-center ">Input Data Acara</h3>
                <div class="card-body mx-2">

                    <?= form_open_multipart(base_url('tambah_acara')); ?>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Tempat</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_tempat" placeholder="Masukkan Nama tempat" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Kategori Acara</label>
                        <div class="col-sm-9">
                            <select name="id_kategori_acara" class="form-control" required>
                                <option value="">Pilih Kategori Acara</option>
                                <?php
                                foreach ($kategori_acara as $row) {
                                    echo '<option value="' . $row->id_kategori_acara . '">' . $row->kategori_acara . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Tanggal Acara</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal_acara" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Deskripsi Acara</label>
                        <div class="col-sm-9">
                            <textarea name="deskripsi_acara" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Gambar Acara</label>
                        <div class="col-sm-9">
                            <input type="file" name="gambar_acara" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9 ">
                            <button type="submit" class="btn btn-success">Simpan</button>
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
<?php foreach ($acara as  $a) { ?>
    <div class="modal fade" id="edit<?= $a->id_acara ?>" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card">
                    <br>
                    <h3 class="text-center ">Edit Data Acara</h3>
                    <div class="card-body mx-2">

                        <?= form_open_multipart(base_url('edit_acara')); ?>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Tempat</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="id_acara" value="<?= $a->id_acara ?>">
                                <input type="text" name="nama_tempat" value="<?= $a->nama_tempat ?>" placeholder="Masukkan Nama tempat" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Kategori Acara</label>
                            <div class="col-sm-9">
                                <select name="id_kategori_acara" class="form-control" required>
                                    <option value="">Pilih Kategori Acara</option>
                                    <?php
                                    foreach ($kategori_acara as $row) { ?>
                                        <option value="<?= $a->id_kategori_acara ?>" <?php if ($a->id_kategori_acara == $row->id_kategori_acara) {
                                                                                            echo "selected";
                                                                                        } ?>> <?= $a->kategori_acara ?> </option>';
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Tanggal Acara</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal_acara" value="<?= $a->tanggal_acara ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Deskripsi Acara</label>
                            <div class="col-sm-9">
                                <textarea name="deskripsi_acara" id="" cols="30" rows="5" class="form-control"> <?= $a->deskripsi_acara ?> </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Gambar Acara</label>
                            <div class="col-sm-9">
                                <input type="file" name="gambar_acara" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Preview Gambar Acara</label>
                            <div class="col-sm-9">
                                <img src="<?= base_url('/acara/' . $a->gambar_acara) ?>" alt="" id="gambar_load" width="300px">
                                <br>
                                <span><small class="text-danger">*Harap Kosongkan saja form gambar jika tidak ingin menggantinya</small></span>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9 ">
                                <button type="submit" class="btn btn-success">Simpan</button>
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
<?php echo $this->endSection('content');
