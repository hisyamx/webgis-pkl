@extends('layouts.master')

@section('content')

<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
        <h3 class="card-title">Edit Data</h3>
        </div>
        <form action="/hasil/update/{{ $hasil->id_hasil }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Hasil Perkebunan</label>
                            <input name="nama" value="{{ $hasil->nama }}" class="form-control" placeholder="Nama hasil">
                            <div class="text-danger">
                                @error('nama')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Perkebunan</label>
                            <select name="id_perkebunan" class="form-control">
                                <option value="{{ $hasil->id_perkebunan }}">{{ $hasil->perkebunan }}</option>
                                @foreach ($perkebunan as $data)
                                    <option value="{{ $data->id_perkebunan }}">{{ $data->perkebunan }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                @error('id_perkebunan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="{{ $hasil->status }}">{{ $hasil->status }}</option>
                                <option value="Besar">Besar</option>
                                <option value="Kecil">Kecil</option>
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
                            <label>Wilayah</label>
                            <select name="id_wilayah" class="form-control">
                                <option value="{{ $hasil->id_wilayah }}">{{ $hasil->wilayah }}</option>
                                @foreach ($wilayah as $data)
                                    <option value="{{ $data->id_wilayah }}">{{ $data->wilayah }}</option>
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
                            <label>Alamat Hasil</label>
                            <input name="alamat" value="{{ $hasil->alamat }}" class="form-control" placeholder="Alamat hasil">
                            <div class="text-danger">
                                @error('alamat')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Posisi Hasil Perkebunan</label>
                            <input name="posisi" value="{{ $hasil->posisi }}" id="posisi" class="form-control" placeholder="Posisi hasil" readonly>
                            <div class="text-danger">
                                @error('posisi')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Foto Hasil Perkebunan</label>
                                <input type="file" name="foto" class="form-control" accept="image/jpeg,image/png">
                            <div class="text-danger">
                                @error('foto')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label>Map</label><label class="text-danger">(Drag and Drop Marker Atau Klik Map Untuk Menentukan Posisi hasil)</label>
                        <div id="map" style="width: 100%; height: 300px;"></div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" rows="5">{{ $hasil->deskripsi }}</textarea>
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
        <button type="submit" class="btn btn-warning float-right">Batal</button>
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
        center: [{{ $hasil->posisi }}],
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
    var curLocation = [{{ $hasil->posisi }}];
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


