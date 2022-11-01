<?php echo $this->extend('admin/template/template') ?>
<?php echo $this->section('content') ?>

<!-- #################### awal section #####################  -->
<div class="col-12">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-header">

            <button class="btn btn-sm btn-primary btn-round waves-effect waves-light"><a data-target="#add_kategori" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data</a></button>
            <p></p>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width='10%'>No</th>
                                <th>Nama kategori</th>
                                <th width='20%'>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no  = 1;
                            foreach ($kategori as $key => $k) { ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $k['nama_kategori'] ?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#edit_kategori<?= $k['id_kategori'] ?>"> <button class="btn btn-success btn-sm btn-round waves-effect waves-light"> <i class="fa fa-edit"></i> Edit </button></a>
                                        <a href="<?= base_url('delete_kategori/' . $k['id_kategori']) ?>" onclick=" return confirm('Apakah anda yakin akan mengapus data?')"> <button class="btn btn-danger btn-sm btn-round waves-effect waves-light"><i class="fa fa-trash"></i> Hapus</button></a>
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
</div>
<div class="modal fade" id="add_kategori" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="text-center mb-4 mt-3">Input Data kategori Pariwisata</h3>
            </div>
            <div class="row">
                <div class="col col-md-1"></div>
                <div class="col col-md-10">
                    <form action="<?= base_url('add_kategori') ?>" method="post">
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Nama kategori</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_kategori" placeholder="Masukkan Nama kategori Pariwisata" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9 mb-4 mt-4">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button type="reset" class="btn btn-warning">Batal</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col col-md-1"></div>
            </div>
        </div>
    </div>
</div>
<?php foreach ($kategori as $k) { ?>
    <div class="modal fade" id="edit_kategori<?= $k['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="text-center mb-4 mt-3">Edit Data kategori Pariwisata</h3>
                </div>
                <div class="row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-10">
                        <form action="<?= base_url('edit_kategori') ?>" method="post">
                            <input type="hidden" name="id_kategori" value="<?= $k['id_kategori'] ?>" class=" form-control" required>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Nama kategori</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_kategori" value="<?= $k['nama_kategori'] ?>" placeholder="Masukkan Nama kategori Pariwisata" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9 mb-4 mt-4">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <button type="reset" class="btn btn-warning">Batal</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- #################### akhir section #####################  -->

<?php echo $this->endSection('content') ?>