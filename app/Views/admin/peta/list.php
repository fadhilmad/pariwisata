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

<!-- #################### awal section #####################  -->
<div class="col-12">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">

            <a href="<?= base_url('tambah_peta') ?>"><button class="btn btn-sm btn-primary btn-round waves-effect waves-light"><i class="fa fa-plus"></i> Tambah Data</button></a>
            <p></p>
            <div class="card-body table-responsive p-0">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5%'>No</th>
                            <th>Kategori Pariwisata</th>
                            <th>Nama</th>
                            <th>Lokasi </th>
                            <th>Deskripsi </th>
                            <th>Gambar </th>
                            <th width='20%'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no  = 1;
                        foreach ($wisata as $w) { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $w->nama_kategori ?></td>
                                <td><?= substr($w->nama_pariwisata, 0, 20) ?>...</td>
                                <td><?= substr($w->lokasi_pariwisata, 0, 20) ?>...</td>
                                <td><?= substr($w->deskripsi_pariwisata, 0, 20) ?>...</td>
                                <td><img class="imgg" src="<?= base_url() . "/images/" . $w->gambar_pariwisata  ?>"></td>
                                <td><a class="btn btn-success btn-sm" href="<?= base_url('edit_peta/' . $w->id_pariwisata) ?>"> <i class="fa fa-edit"></i> Edit </a>
                                    <a href="<?= base_url('delete_peta/' . $w->id_pariwisata) ?>" class="btn btn-danger btn-sm swalDefaultSuccess" onclick=" return confirm('Apakah anda yakin akan mengapus data?')"><i class="fa fa-trash"></i> Hapus</a>
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
<!-- #################### akhir section #####################  -->

<?php echo $this->endSection() ?>