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

<div class="card">

    <div class="card-body">

        <?= form_open_multipart(base_url('edit_penginapan')); ?>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div id="map"></div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="form-group">
                    <label for="inputPassword3" class=" col-form-label">Nama Penginapan </label>
                    <input type="hidden" value="<?= $penginapan->id_penginapan ?>" name="id_penginapan">
                    <input type="text" value="<?= $penginapan->nama_tempat ?>" name="nama_tempat" placeholder="Masukkan Nama Penginapan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Latitude</label>
                    <input type="text" value="<?= $penginapan->latitude ?>" name="latitude" class="form-control" id="Latitude">
                </div>
                <div class="form-group">
                    <label for="">Logitude</label>
                    <input type="text" value="<?= $penginapan->longitude ?>" name="longitude" class="form-control" id="Longitude">
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class=" col-form-label">Lokasi Penginapan </label>
                    <input type="text" value="<?= $penginapan->lokasi_tempat ?>" name="lokasi_tempat" placeholder="Masukkan Lokasi Penginapan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class=" col-form-label">Deskripsi Penginapan</label>
                    <textarea name="deskripsi_tempat" id="" cols="30" rows="5" class="form-control"> <?= $penginapan->deskripsi_tempat ?></textarea>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class=" col-form-label">Gambar Penginapan</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-form-label">Preview Gambar Penginapan</label>
                    <br>
                    <img src="<?= base_url('/penginapan/' . $penginapan->gambar) ?>" alt="" id="gambar_load" width="300px">
                    <br>
                    <span><small class="text-danger">*Harap Kosongkan saja form gambar jika tidak ingin menggantinya</small></span>
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

    var lat = $("#Latitude").val();
    var lng = $("#Longitude").val();
    if (lat == '' || lat == '') {
        lat = -7.099276418193467;
        lng = 112.35245701042798;
    }
    if (curLocation[0] == 0 && curLocation[1] == 0) {
        curLocation = [lat, lng];
    }
    var map = L.map('map').setView([lat, lng], 15);

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