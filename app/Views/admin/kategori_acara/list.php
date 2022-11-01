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
                                <th>Nama kategori Acara</th> 
                                <th width='20%'>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no  = 1;
                            foreach ($kategori_acara as $key => $k) { ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $k->kategori_acara ?></td> 
                                    <td>

                                        <a data-toggle="modal" data-target="#edit_kategori<?= $k->id_kategori_acara ?>"> <button class="btn btn-success btn-sm btn-round waves-effect waves-light"> <i class="fa fa-edit"></i> Edit </button></a>
                                        <a href="<?= base_url('delete_kategori_acara/' . $k->id_kategori_acara) ?>" onclick=" return confirm('Apakah anda yakin akan mengapus data?')"> <button class="btn btn-danger btn-sm btn-round waves-effect waves-light"><i class="fa fa-trash"></i> Hapus</button></a>
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
                <h5 class="text-center mb-4 mt-3">Input Data kategori Acara</h3>
            </div>
            <div class="row">
                <div class="col col-md-1"></div>
                <div class="col col-md-10">
                    <form action="<?= base_url('add_kategori_acara') ?>" method="post">
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Kategori acara</label>
                            <div class="col-sm-9">
                                <input type="text" name="kategori_acara" placeholder="Contoh : Acara Tahunan" class="form-control" required>
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
<?php foreach ($kategori_acara as $k) { ?>
    <div class="modal fade" id="edit_kategori<?= $k->id_kategori_acara ?>" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="text-center mb-4 mt-3">Edit Data kategori Acara</h3>
                </div>
                <div class="row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-10">
                        <form action="<?= base_url('edit_kategori_acara') ?>" method="post">
                            <input type="hidden" name="id_kategori_acara" value="<?= $k->id_kategori_acara ?>" class=" form-control" required>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Kategori Acara</label>
                                <div class="col-sm-9">
                                    <input type="text" name="kategori_acara" value="<?= $k->kategori_acara ?>" placeholder="Masukkan Nama kategori Pariwisata" class="form-control" required>
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