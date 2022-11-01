<?php echo $this->extend('admin/template/template') ?>

<?php echo $this->section('content') ?>
<?php helper('form'); ?>
<div class="col-12">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <div class="card-body table-responsive p-0">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5%'>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th width='20%'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no  = 1;
                        foreach ($feedback as $a) { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $a->nama ?></td>
                                <td><?= $a->email ?></td>
                                <td><?= $a->pesan ?></td>
                                <td>
                                    <a href="<?= base_url('delete_feedback/' . $a->id) ?>" class="btn btn-danger btn-sm swalDefaultSuccess" onclick=" return confirm('Apakah anda yakin akan mengapus data?')"><i class="fa fa-trash"></i> Hapus</a>
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
