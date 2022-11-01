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
    <div class="card table-card">
        <div class="card-header">
            <h5><?= $kuliner->nama_kuliner ?> | Input Toko</h5>
        </div>
        <div class="card-body ">
            <?= form_open_multipart(base_url('tambah_toko')); ?>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Nama toko </label>
                <div class="col-sm-9">
                    <input type="hidden" name="id_kuliner" value="<?= $kuliner->id_kuliner ?>">
                    <input type="text" name="nama_toko" placeholder="Masukkan Nama toko" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Alamat Toko </label>
                <div class="col-sm-9">
                    <input type="text" name="alamat" placeholder="Masukkan Alamat Toko" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Foto</label>
                <div class="col-sm-9">
                    <input type="file" name="foto" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9 ">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="reset" class="btn btn-warning">Batal</button>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
            <h5><?= $kuliner->nama_kuliner ?> | List Toko</h5>
        </div>
        <div class="card-body">
            <div class="card-body table-responsive p-0">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5%'>No</th>
                            <th>Nama Kuliner </th>
                            <th>Nama Toko</th>
                            <th>Alamat </th>
                            <th>Gambar </th>

                            <th width='20%'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no  = 1;
                        foreach ($toko as $k) { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= substr($k->nama_kuliner, 0, 20) ?>...</td>
                                <td><?= substr($k->nama_toko, 0, 20) ?>...</td>
                                <td><?= substr($k->alamat, 0, 20) ?>...</td>
                                <td><img class="imgg" src="<?= base_url() . "/kuliner/toko/" . $k->foto ?>"></td>
                                <td>
                                    <a href="<?= base_url('hapus_toko/' . $k->id_toko) ?>" class="btn btn-danger btn-sm swalDefaultSuccess" onclick=" return confirm('Apakah anda yakin akan mengapus data?')"><i class="fa fa-trash"></i> Hapus</a>
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

<?php echo $this->endSection('content');
