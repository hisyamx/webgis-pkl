@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
        <h3 class="card-title">Add Data</h3>
        </div>
        <form action="/sekolah/insert" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Sekolah</label>
                            <input name="nama_sekolah" class="form-control" placeholder="Nama Sekolah">
                            <div class="text-danger">
                                @error('nama_sekolah')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jenjang</label>
                            <select name="id_jenjang" class="form-control">
                                <option value="">--Pilih Jenjang--</option>
                                @foreach ($jenjang as $data)
                                    <option value="{{ $data->id_jenjang }}">{{ $data->jenjang }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                @error('id_jenjang')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="">--Pilih Status--</option>
                                <option value="Negeri">Negeri</option>
                                <option value="Swasta">Swasta</option>
                            </select>
                            <div class="text-danger">
                                @error('status')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <select name="id_kecamatan" class="form-control">
                                <option value="">--Pilih Kecamatan--</option>
                                @foreach ($kecamatan as $data)
                                    <option value="{{ $data->id_kecamatan }}">{{ $data->kecamatan }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                @error('status')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Alamat Sekolah</label>
                            <input name="alamat" class="form-control" placeholder="Alamat Sekolah">
                            <div class="text-danger">
                                @error('alamat')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Posisi Sekolah</label>
                            <input name="posisi" id="posisi" class="form-control" placeholder="Posisi Sekolah" readonly>
                            <div class="text-danger">
                                @error('posisi')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Foto Sekolah</label>
                                <input type="file" name="foto" class="form-control" accept="image/jpeg,image/png">
                            <div class="text-danger">
                                @error('foto')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label>Map</label><label class="text-danger">(Drag and Drop Marker Atau Klik Map Untuk Menentukan Posisi Sekolah)</label>
                        <div id="map" style="width: 100%; height: 300px;"></div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" rows="5"></textarea>
                            <div class="text-danger">
                                @error('deskripsi')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

        </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
        <button type="submit" class="btn btn-warning float-right">Cancel</button>
    </div>
</form>
</div>
</div>


<script>
    var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    });

    var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/satellite-v9'
    });


    var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/dark-v10'
    });

    var map = L.map('map', {
        center: [-0.932910117571772, 100.39606514807615],
        zoom: 14,
        layers: [peta1],
    });

    var baseMaps = {
        "Grayscale": peta1,
        "Satellite": peta2,
        "Streets": peta3,
        "Dark": peta4,
    };

    L.control.layers(baseMaps).addTo(map);

    //mengambil titik koordinat
    var curLocation = [-0.932910117571772, 100.39606514807615];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation,{
        draggable : 'true',
    });
    map.addLayer(marker);

    //ambil koordinat saat marker di drag n drop
    marker.on('dragend',function(event){
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable : 'true',
        }).bindPopup(position).update();
        //console.log(position.lat + "," + position.lng);
        $("#posisi").val(position.lat + "," + position.lng).keyup();
    });

    //ambil koordinat saatmap diklik
    var posisi = document.querySelector("[name=posisi]");
    map.on("click",function(event){
        var lat = event.latlng.lat;
        var lng = event.latlng.lng;
        if(!marker)
        {
            marker = L.marker(event.latlng).addTo(map);
        }else{
            marker.setLatLng(event.latlng);
        }
        posisi.value = lat + "," + lng;
    });


</script>

@endsection


