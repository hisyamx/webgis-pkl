@extends('layouts.master')
@section('title', 'Tambah Data Hasil Perkebunan')
@section('content')
<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex items-center mt-5">
        <h2 class="text-lg font-medium mr-auto">
            Tambah Data Hasil Perkebunan
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Tambahkan Data
                    </h2>
                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <form action="{{ route('admin.hasil.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="nama" class="form-label">Nama Hasil Perkebunan</label>
                                <input name="nama" id="nama" type="text" class="form-control" placeholder="Nama Hasil Perkebunan"
                                    value="{{ old('nama') }}">
                            </div>
                            <div class="mt-3">
                                <label for="jenis" class="form-label">Jenis</label>
                                <select name="jenis" class="form-control">
                                <option value="">--Jenis Perkebunan--</option>
                                    <option value="Besar">Besar</option>
                                    <option value="Kecil">Kecil</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="id_perkebunan" class="form-label">Perkebunan</label>
                                <select name="id_perkebunan" class="form-control">
                                <option value="">--Pilih Perkebunan--</option>
                                @foreach ($perkebunan as $data)
                                    <option value="{{ $data->id_perkebunan }}">{{ $data->nama }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="id_wilayah" class="form-label">Wilayah</label>
                                <select name="id_wilayah" class="form-control">
                                <option value="">--Pilih Wilayah--</option>
                                @foreach ($wilayah as $data)
                                    <option value="{{ $data->id_wilayah }}">{{ $data->nama }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="jumlah" class="form-label">Jumlah Hasil Perkebunan</label>
                                <div class="grid-cols-3 gap-2">
                                    <div class="input-group">
                                        <div id="input-group-3" class="input-group-text">Kuintal</div>
                                        <input type="text" class="form-control" placeholder="Jumlah Hasil"
                                            aria-describedby="input-group-12" name="jumlah" value="{{ old('jumlah') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="tahun" class="form-label">Tahun Hasil Perkebunan</label>
                                <input name="tahun" id="tahun" type="text" class="form-control" placeholder="Tahun Hasil Perkebunan"
                                value="{{ old('tahun') }}">
                            </div>
                            <div class="mt-3">
                                <label for="deskripsi" class="form-label">Deskripsi Perkebunan (Opsional)</label>
                                <textarea name="deskripsi" id="deskripsi" rows="7" type="text" class="form-control"
                                placeholder="Deskripsi Perkebunan">{{ old('deskripsi') }}</textarea>
                            </div>
                            <div class="mt-3">
                                <label for="cover_image" class="form-label">Tambahkan Foto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="cover_image">
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="posisi" class="form-label">Posisi</label>
                                <input name="posisi" id="posisi" type="text" class="form-control" placeholder="Posisi Kebun"
                                    value="{{ old('posisi') }}" readonly>
                            </div>
                            <div class="mt-3">
                                <label for="luas" class="form-label">Maps <span>(Drag and Drop Marker Atau Klik Map Untuk Menentukan Posisi Hasil Perkebunan)</span></label>
                                <div id="map" style="width: 100%; height: 500px;"></div>
                            </div>
                            {{-- <div class="text-right mt-5"> --}}
                                <button type="submit" class="btn btn-primary w-24 mt-5">Tambah</button>
                            {{-- </div> --}}
                        </form>
                        <!-- END: Form Layout -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content -->
@endsection

{{-- @section('page-css')
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
@endsection --}}

@section('page-js')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js">
</script> --}}

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

    @foreach ($wilayah as $data)
    var data{{ $data->id_wilayah }} = L.layerGroup();
    @endforeach

    var wilayah = L.layerGroup();



    var map = L.map('map', {
        center: [-7.031013404745716, 109.62808439037346],
        zoom: 10,
        layers: [peta1,
        @foreach ($wilayah as $data)
            data{{ $data->id_wilayah }},
        @endforeach
        wilayah,
        ]
    });

    var baseMaps = {
        "Grayscale": peta1,
        "Satellite": peta2,
        "Streets": peta3,
        "Dark": peta4,
    };

    var overlayer = {
        @foreach ($wilayah as $data)
        "{{ $data->wilayah }}" : data{{ $data->id_wilayah }},
        @endforeach
        "Wilayah" : wilayah,
    };

    L.control.layers(baseMaps).addTo(map);


    @foreach ($wilayah as $data)
        L.geoJSON(<?= $data->geojson ?>,{
            style : {
                color : 'white',
                fillColor : '{{ $data->warna }}',
                fillOpacity : 1.0,
            },
        }).addTo(data{{ $data->id_wilayah }});
    @endforeach


    //mengambil titik koordinat
    var curLocation = [-7.031013404745716, 109.62808439037346];
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
