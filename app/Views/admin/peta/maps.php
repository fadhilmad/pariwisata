<?php echo $this->extend('admin/template/template') ?>
<?php echo $this->section('head') ?>
<!-- ################ Awal Section Untuk Maps ################  -->
<link href="<?= base_url('leaflet/leaflet.css') ?>" rel="stylesheet">
<style>
    #map {
        height: 500px;
    }
</style>
<script src="<?= base_url('leaflet/leaflet.js') ?>"></script>
<script src="<?= base_url('leaflet-color-markers-master/js/leaflet-color-markers-master.js') ?>"></script>

<!-- ################ Akhir Section Untuk Maps ################  -->
<?php echo $this->endSection() ?>
<?php echo $this->section('content') ?>

<!-- #################### awal section #####################  -->
<div class="col-xl-12 col-12" id="map">
</div>
<!-- #################### akhir section #####################  -->

<?php echo $this->endSection() ?>
<?php echo $this->section('script') ?> 

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
                "Deskripsi : <?= substr($value->deskripsi_pariwisata, 0, 20); ?>...</br>"
            );
    <?php } ?>
</script>
<?php echo $this->endSection() ?>