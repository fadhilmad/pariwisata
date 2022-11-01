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
            <a href="<?= base_url('add_penginapan') ?>"><button class="btn btn-sm btn-primary btn-round waves-effect waves-light"><i class="fa fa-plus"></i> Tambah Data</button></a>
            <p></p>
            <div class="card-body table-responsive p-0">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5%'>No</th>
                            <th>Nama Penginapan</th>
                            <th>Deskripsi Penginapan </th>
                            <th>Lokasi Penginapan </th>
                            <th>Gambar </th>

                            <th width='20%'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no  = 1;
                        foreach ($penginapan as $p) { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= substr($p->nama_tempat, 0, 20) ?>...</td>
                                <td><?= substr($p->lokasi_tempat, 0, 20) ?>...</td>
                                <td><?= substr($p->deskripsi_tempat, 0, 20) ?>...</td>
                                <td><img class="imgg" src="<?= base_url() . "/penginapan/" . $p->gambar ?>"></td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="<?= base_url('rubah_penginapan/' . $p->id_penginapan) ?>"> <i class="fa fa-edit"></i> Edit </a>
                                    <a href="<?= base_url('hapus_penginapan/' . $p->id_penginapan) ?>" class="btn btn-danger btn-sm swalDefaultSuccess" onclick=" return confirm('Apakah anda yakin akan mengapus data?')"><i class="fa fa-trash"></i> Hapus</a>
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

<?php foreach ($penginapan as  $p) { ?>
    <div class="modal fade" id="edit<?= $p->id_penginapan ?>" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card">
                    <br>
                    <h3 class="text-center ">Edit Data penginapan</h3>
                    <div class="card-body mx-2">

                        <?= form_open_multipart(base_url('edit_penginapan')); ?>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Penginapan </label>
                            <div class="col-sm-9">
                                <input type="hidden" name="id_penginapan" value="<?= $p->id_penginapan ?>">
                                <input type="text" name="nama_tempat" value="<?= $p->nama_tempat ?>" placeholder="Masukkan Nama Penginapan" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Lokasi Penginapan </label>
                            <div class="col-sm-9">
                                <input type="text" name="lokasi_tempat" value="<?= $p->lokasi_tempat ?>" placeholder="Masukkan Lokasi Penginapan" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Deskripsi Penginapan</label>
                            <div class="col-sm-9">
                                <textarea name="deskripsi_tempat" id="" cols="30" rows="5" class="form-control"><?= $p->deskripsi_tempat ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Gambar Penginapan</label>
                            <div class="col-sm-9">
                                <input type="file" name="gambar" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Preview Gambar Penginapan</label>
                            <div class="col-sm-9">
                                <img src="<?= base_url('/penginapan/' . $p->gambar) ?>" alt="" id="gambar_load" width="300px">
                                <br>
                                <span><small class="text-danger">*Harap Kosongkan saja form gambar jika tidak ingin menggantinya</small></span>
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
