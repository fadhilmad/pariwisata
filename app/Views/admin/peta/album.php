<?php echo $this->extend('admin/template/template') ?>

<?php echo $this->section('head') ?>
<link rel="stylesheet" href="<?= base_url() ?>/bn/tambahan/ekko-lightbox/ekko-lightbox.css">
<script src="<?= base_url() ?>/bn/tambahan/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/bn/tambahan/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/bn/tambahan/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="<?= base_url() ?>/bn/tambahan/filterizr/jquery.filterizr.min.js"></script>
<script>
    $(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({
            gutterPixels: 4
        });
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })
</script>
<?php echo $this->endSection() ?>
<?php echo $this->section('content') ?>
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div class="card-body table-responsive p-0">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tempat</th>
                        <th>Jumlah Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($wisata as $key => $value) {

                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->nama_pariwisata; ?> </td>
                            <td><?= $value->jml_album . " Foto"; ?> </td>
                            <td>
                                <a href="<?= base_url('detail_album_peta/' . $value->id_pariwisata); ?>" class="btn btn-success btn-sm">Detail</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>

<div class="card card-primary">
    <div class="card-body">
        <div>
            <div class="btn-group w-100 mb-2">
                <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> Semua Album</a>
                <?php foreach ($wisata as $p) { ?>
                    <a class="btn btn-info text-capitalize" href="javascript:void(0)" data-filter="<?= $p->id_pariwisata ?>"><?= substr($p->nama_pariwisata, 0, 10) ?> </a>
                <?php } ?>
            </div>

        </div>
        <div>
            <div class="filter-container p-0 row">
                <?php if (!empty($album)) {
                    foreach ($album as $key => $a) {
                ?>
                        <div class="filtr-item col-sm-2" data-category="<?= $a->id_pariwisata ?>">
                            <a href="<?= base_url() ?>/images/album/<?= $a->gambar ?>" data-toggle="lightbox" data-title="<?= $a->nama ?>">
                                <img src="<?= base_url() ?>/images/album/<?= $a->gambar ?>" class="img-fluid mb-2" alt="white sample" />
                            </a>
                        </div>
                <?php }
                } ?>
            </div>
        </div>

    </div>
</div>

<?php echo $this->endSection() ?>
<?php echo $this->section('script') ?>

<?php echo $this->endSection() ?>