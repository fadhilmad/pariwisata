<?php echo $this->extend('admin/template/template') ?>
<?php echo $this->section('head') ?>
<!-- ################ Awal Section Untuk Maps ################  -->
<link href="<?= base_url('leaflet/leaflet.css') ?>" rel="stylesheet">
<script src="<?= base_url('leaflet/leaflet.js') ?>"></script>
<!-- ################ Akhir Section Untuk Maps ################  -->
<?php echo $this->endSection() ?>
<?php echo $this->section('content') ?>

<!-- #################### awal section #####################  -->

<div class="col-xl-12 row">
    <div class="col-xl-6" id="map">
    </div>
    <div class="col-xl-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-body">
                <?= form_open_multipart(base_url('rubah_peta/' . $pariwisata->id_pariwisata)); ?>

                <div class="form-group">
                    <label for="">Nama Wisata</label>
                    <input type="text" name="nama_pariwisata" class="form-control" id="" placeholder="Masukkan Nama Tempat" value="<?= $pariwisata->nama_pariwisata ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Kategori Wisata</label>
                    <select name="id_kategori" class="form-control" required>
                        <option value="">Pilih kategori Wisata</option>
                        <?php
                        foreach ($kategori as $row) { ?>
                            <option value="<?= $row['id_kategori'] ?>" <?php if ($row['id_kategori'] == $pariwisata->id_kategori) {
                                                                            echo "selected";
                                                                        } ?>> <?= $row['nama_kategori'] ?> </option>
                        <?php    }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Latitude</label>
                    <input type="text" name="latitude" value="<?= $pariwisata->latitude ?>" class="form-control" id="Latitude" readonly required>
                </div>
                <div class="form-group">
                    <label for="">Logitude</label>
                    <input type="text" name="longitude" value="<?= $pariwisata->longitude ?>" class="form-control" id="Longitude" readonly required>
                </div>
                <div class="form-group">
                    <label for="">Lokasi</label>
                    <input type="text" name="lokasi_pariwisata" value="<?= $pariwisata->lokasi_pariwisata ?>" class="form-control" placeholder="Masukkan Nama Kelurahan" required>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar_pariwisata" class="form-control">
                </div>

                <div class="form-group">
                    <img src="<?= base_url('/images/' . $pariwisata->gambar_pariwisata) ?>" alt="" id="gambar_load" width="300px">
                    <br>
                    <span><small class="text-danger">*Harap Kosongkan saja form gambar jika tidak ingin mengganti foto</small></span>
                </div>
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi_pariwisata" class="form-control" cols="60" rows="3" required><?= $pariwisata->deskripsi_pariwisata ?></textarea>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button id="submit" type="submit" class="btn btn-primary ">Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<!-- #################### akhir section #####################  -->

<?php echo $this->endSection() ?>
<?php echo $this->section('script') ?>

<script>
    var curLocation = [0, 0];
    if (curLocation[0] == 0 && curLocation[1] == 0) {
        curLocation = [<?= $pariwisata->latitude ?>, <?= $pariwisata->longitude ?>];
    }

    var map = L.map('map').setView([<?= $pariwisata->latitude ?>, <?= $pariwisata->longitude ?>], 15);

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