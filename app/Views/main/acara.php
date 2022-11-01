<?php echo $this->extend('main/template/head') ?>

<?php echo $this->section('head') ?>
<script type="text/javascript">
    function ShowHideDiv() {
        var ddlPassport = document.getElementById("id_pariwisata");
        var dvPassport = document.getElementById("dvselection");
        dvPassport.style.display = ddlPassport.value == "0" ? "block" : "none";

    }
</script>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>
<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<section id="breadcrumbs" class="breadcrumbs ">
    <div class="container text-right">
        <ol>
            <li><a href="<?= base_url() ?>">Beranda</a></li>
            <li><?= $title ?></li>
        </ol>
    </div>
</section>
<?php
if (session()->getFlashdata('flash')) {
    echo '<p></p>';
    echo '<div class="text-capitalize alert mt-2 alert-sm alert-' . session()->getFlashdata('flash')['jenis'] . '">';
    echo session()->getFlashdata('flash')['message'];
    echo '<a href="#" class="alert-link "></a>.</div>';
    echo '<p></p>';
}
?>
<section id="blog" class="blog">
    <div class="container " data-aos="fade-up">
        <?php if (session()->get('status') == 'user') { ?>
            <div class="row justify-content-end">
                <div class="text-right mx-2">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#add_acara">
                        <i class="bx bx-plus"></i> Booking Acara
                    </button>
                </div>

            </div>
        <?php } ?>
        <div class=" text-left text-black">
            <h3 class="text-capitalize "><?= $title ?> <?php if (!empty($kategori_acara)) {
                                                            echo "| " . $kategori_acara['kategori_acara'];
                                                        } elseif (!empty($waktu)) {
                                                            echo "| " . $waktu;
                                                        } ?></h3>
        </div>

        <div class="row">
            <?php foreach ($acara as $a) { ?>
                <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                    <article class="entry">

                        <div class="entry-img">
                            <img src="<?= base_url() ?>/acara/<?= $a->gambar_acara ?>" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="#"><?= $a->nama_tempat ?></a>
                        </h2>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="<?= base_url('detail_acara/' . $a->id_acara) ?>"><time datetime="<?= $a->tanggal_acara ?>"><?= tgl_indo($a->tanggal_acara);  ?></time></a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                <?= substr($a->deskripsi_acara, 0, 100) ?> ..
                            </p>
                            <div class="read-more">
                                <a href="<?= base_url('detail_acara/' . $a->slug_acara) ?>">Baca Selengkapnya</a>
                            </div>
                        </div>

                    </article><!-- End blog entry -->
                </div>
            <?php } ?>
        </div>
    </div>

</section>
<!-- Button trigger modal -->
<?php if (session()->get('status') == 'user') { ?>
    <div class="modal fade" id="add_acara" role="dialog" aria-labelledby="Details" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-center">Booking Acara</h3>
                </div>
                <?= form_open_multipart(base_url('user_tambah_acara')); ?>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Lokasi</label>
                        <div class="col-sm-9">
                            <select name="id_pariwisata" id="id_pariwisata" onchange="ShowHideDiv()" class="form-control">
                                <option value="">Pilih Lokasi Acara</option>
                                <?php
                                foreach ($lokasi as $row) {
                                    echo '<option value="' . $row->slug_pariwisata . '">' . $row->nama_pariwisata . '</option>';
                                }
                                ?>
                                <option value="0">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div id="dvselection" style="display: none">
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Tempat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Nama Tempat" name="nama_tempat">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Kategori Acara</label>
                        <div class="col-sm-9">
                            <select name="id_kategori_acara" id="id_kategori_acara" class="form-control" required>
                                <option value="">Pilih Kategori Acara</option>
                                <?php
                                foreach ($kat_acara as $row) {
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

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="reset" class="btn btn-warning">Batal</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

<?php } ?>
<?php echo $this->endSection() ?>