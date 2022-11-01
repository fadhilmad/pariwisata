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
<div class="col-12">
    <div class="card">

        <?= form_open_multipart('simpan_album_acara'); ?>
        <div class="card-body">
            <input type="hidden" name="id_acara" value="<?= $acara->id_acara ?>">
            <div class="form-group">
                <label>Nama Foto</label>
                <input value="<?= set_value('nama'); ?>" type="text" name="nama" class="form-control" id="" placeholder="Masukkan nama Foto" required>
            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control file-input" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
        </div>
        <?php echo form_close() ?>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title">Album</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <?php if (!empty($album)) {
                    foreach ($album as $key => $a) {
                ?>
                        <div class="col-sm-2" data-category="<?= $a->id_acara ?>">
                            <a href="<?= base_url() ?>/acara/album/<?= $a->gambar ?>" data-toggle="lightbox" data-title="<?= $a->nama ?>" data-gallery="gallery">
                                <img src="<?= base_url() ?>/acara/album/<?= $a->gambar ?>" class="img-fluid mb-2" alt="white sample" />
                            </a>
                            <a href="<?= base_url('hapus_album_acara/' . $a->id) ?>" class="text-black"><i class="fa fa-trash"></i></a>
                        </div>
                <?php }
                } ?>
            </div>
            <a class="btn btn-sm btn-info" href="<?= base_url('all_album_acara') ?>"><i class="ti-arrow-left"></i> Kembali</a>
        </div>
    </div>
</div>

<?php echo $this->endSection() ?>