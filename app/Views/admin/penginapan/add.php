<?php echo $this->extend('admin/template/template') ?>
<?php echo $this->section('head') ?>
<!-- ################ Awal Section Untuk Maps ################  -->
<link href="<?= base_url('leaflet/leaflet.css') ?>" rel="stylesheet">
<script src="<?= base_url('leaflet/leaflet.js') ?>"></script>
<style>
    #map {
        height: 100%;
        width: 100%;
        min-height: 400px;
    }
</style>
<!-- ################ Akhir Section Untuk Maps ################  -->
<?php echo $this->endSection() ?>
<?php echo $this->section('content') ?>

<div class="card">

    <div class="card-body">

        <?= form_open_multipart(base_url('tambah_penginapan')); ?>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div id="map"></div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="form-group">
                    <label for="inputPassword3" class=" col-form-label">Nama Penginapan </label>
                    <input type="text" name="nama_tempat" placeholder="Masukkan Nama Penginapan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Latitude</label>
                    <input type="text" name="latitude" class="form-control" id="Latitude">
                </div>
                <div class="form-group">
                    <label for="">Logitude</label>
                    <input type="text" name="longitude" class="form-control" id="Longitude">
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class=" col-form-label">Lokasi Penginapan </label>
                    <input type="text" name="lokasi_tempat" placeholder="Masukkan Lokasi Penginapan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class=" col-form-label">Deskripsi Penginapan</label>
                    <textarea name="deskripsi_tempat" id="" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class=" col-form-label">Gambar Penginapan</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="reset" class="btn btn-warning">Batal</button>

                </div>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>

<?php echo $this->endSection() ?>

<?php echo $this->section('script') ?>

<script>
    var curLocation = [0, 0];
    if (curLocation[0] == 0 && curLocation[1] == 0) {
        curLocation = [-7.116820542833942, 112.33165524242588];
    }

    var map = L.map('map').setView([-7.116820542833942, 112.33165524242588], 12);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.satellite',
        accessToken: 'pk.eyJ1IjoiZ2l2YW5nIiwiYSI6ImNqeDMydHZ4NzBmaDg0OW5zbjRla3dobXIifQ.qjS0wBxXfvfxJMBB9VPd5g'
    }).addTo(map);

    map.attributionControl.setPrefix(false);
    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        $("#Latitude").val(position.lat);
        $("#Longitude").val(position.lng).keyup();
    });

    $("#Latitude, #Longitude").change(function() {
        var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        map.panTo(position);
    });
    map.addLayer(marker);
</script>

<?php echo $this->endSection() ?>