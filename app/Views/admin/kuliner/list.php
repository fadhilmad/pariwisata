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
            <a data-target="#add_kuliner" data-toggle="modal"><button class="btn btn-sm btn-primary btn-round waves-effect waves-light"><i class="fa fa-plus"></i> Tambah Data</button></a>
            <p></p>
            <div class="card-body table-responsive p-0">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5%'>No</th>
                            <th>Nama Kuliner</th>
                            <th>Deskripsi Kuliner </th>
                            <th>Gambar </th>

                            <th width='20%'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no  = 1;
                        foreach ($kuliner as $k) { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= substr($k->nama_kuliner, 0, 20) ?>...</td>
                                <td><?= substr($k->deskripsi_kuliner, 0, 20) ?>...</td>
                                <td><img class="imgg" src="<?= base_url() . "/kuliner/" . $k->gambar_kuliner ?>"></td>
                                <td>
                                    <a class="btn btn-success btn-sm" data-toggle="modal" href="#edit<?= $k->id_kuliner  ?>"> <i class="fa fa-edit"></i> Edit </a>
                                    <a class="btn btn-info btn-sm" href="<?= base_url('toko/' . $k->id_kuliner)  ?>"> <i class="fa fa-shopping-cart"></i> Toko </a>
                                    <a href="<?= base_url('hapus_kuliner/' . $k->id_kuliner) ?>" class="btn btn-danger btn-sm swalDefaultSuccess" onclick=" return confirm('Apakah anda yakin akan mengapus data?')"><i class="fa fa-trash"></i> Hapus</a>
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

<div class="modal fade" id="add_kuliner" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card">
                <br>
                <h3 class="text-center ">Input Data kuliner</h3>
                <div class="card-body mx-2">

                    <?= form_open_multipart(base_url('tambah_kuliner')); ?>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Kuliner </label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_kuliner" placeholder="Masukkan Nama Kuliner" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Deskripsi kuliner</label>
                        <div class="col-sm-9">
                            <textarea name="deskripsi_kuliner" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Gambar Kuliner</label>
                        <div class="col-sm-9">
                            <input type="file" name="gambar_kuliner" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9 ">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-warning">Batal</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php foreach ($kuliner as  $k) { ?>
    <div class="modal fade" id="edit<?= $k->id_kuliner ?>" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card">
                    <br>
                    <h3 class="text-center ">Edit Data kuliner</h3>
                    <div class="card-body mx-2">

                        <?= form_open_multipart(base_url('edit_kuliner')); ?>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Kuliner</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="id_kuliner" value="<?= $k->id_kuliner ?>">
                                <input type="text" name="nama_kuliner" value="<?= $k->nama_kuliner ?>" placeholder="Masukkan Nama Kuliner" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Deskripsi Kuliner</label>
                            <div class="col-sm-9">
                                <textarea name="deskripsi_kuliner" id="" cols="30" rows="5" class="form-control"> <?= $k->deskripsi_kuliner ?> </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Gambar Kuliner</label>
                            <div class="col-sm-9">
                                <input type="file" name="gambar_kuliner" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Preview Gambar kuliner</label>
                            <div class="col-sm-9">
                                <img src="<?= base_url('/kuliner/' . $k->gambar_kuliner) ?>" alt="" id="gambar_load" width="300px">
                                <br>
                                <span><small class="text-danger">*Harap kosongkan saja form gambar jika tidak ingin menggantinya</small></span>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9 ">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button type="reset" class="btn btn-warning">Batal</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
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
