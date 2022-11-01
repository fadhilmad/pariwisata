<?php echo $this->extend('main/template/head') ?>
<?php echo $this->section('head') ?>
<!-- ################ Awal Section Untuk Maps ################  -->
<style>
    #map {
        height: 500px;
        width: inherit;
    }
</style>

<!-- ################ Akhir Section Untuk Maps ################  -->
<?php echo $this->endSection('head') ?>
<?php echo $this->section('content') ?>
<section id="breadcrumbs" class="breadcrumbs ">
    <div class="container text-right">
        <ol>
            <li><a href="<?= base_url() ?>">Beranda</a></li>
            <li><?= $title ?></li>
        </ol>
    </div>
</section>
<section id="why-us" class="why-us">
    <div class="container-fluid">
        <div id="map">
        </div>
    </div>
</section>

<script>
    var map = L.map('map').setView({
        lat: -7.116820542833942,
        lon: 112.33165524242588
    }, 10);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.satellite',
        accessToken: 'pk.eyJ1IjoiZ2l2YW5nIiwiYSI6ImNqeDMydHZ4NzBmaDg0OW5zbjRla3dobXIifQ.qjS0wBxXfvfxJMBB9VPd5g'
    }).addTo(map);
    <?php foreach ($wisata as $key => $value) { ?>
        L.marker([<?= $value->latitude; ?>, <?= $value->longitude; ?>], {
                color: 'red',
                fillColor: '#f03',
            }).addTo(map)
            .bindPopup(
                "Jenis Wisata : <?= $value->nama_kategori; ?></br>" +
                "Nama Wisata : <?= $value->nama_pariwisata; ?></br>" +
                "Latitude : <?= $value->latitude; ?></br> " +
                "Longitude : <?= $value->longitude; ?></br>" +
                "Lokasi : <?= substr($value->lokasi_pariwisata, 0, 20); ?>...</br>" +
                "Deskripsi : <?= substr($value->deskripsi_pariwisata, 0, 20); ?>...</br>" +
                "<a href='<?= base_url('detail_destinasi/' . $value->slug_pariwisata) ?>' class='btn btn-sm btn-outline-primary'>Detail</a>" +
                "<a href='https://www.google.com/maps/dir//<?= $value->latitude ?>,<?= $value->longitude ?>'/' class='btn btn-sm btn-outline-success' target='_blank'>Rute</a>"

            );
    <?php } ?>
</script>

<?php echo $this->endSection() ?>