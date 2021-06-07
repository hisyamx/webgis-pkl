@extends('layouts.frontend')
@section('content')

<div id="map" style="width: 100%; height: 700px;"></div>



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

    @foreach ($kecamatan as $data)
        var data{{ $data->id_kecamatan }} = L.layerGroup();
    @endforeach
    var sekolah = L.layerGroup();

    var map = L.map('map', {
        center: [-0.932910117571772, 100.39606514807615],
        zoom: 11,
        layers: [peta2, 
        @foreach ($kecamatan as $data)
            data{{ $data->id_kecamatan }},
        @endforeach        
        sekolah,
        ]
    });


    var baseMaps = {
        "Grayscale": peta1,
        "Satellite": peta2,
        "Streets": peta3,
        "Dark": peta4, 
    };

    var overlayer = {
        @foreach ($kecamatan as $data)
        "{{ $data->kecamatan }}" : data{{ $data->id_kecamatan }},
        @endforeach
        "Sekolah" : sekolah,
    };
    
    L.control.layers(baseMaps, overlayer).addTo(map);

    @foreach ($kecamatan as $data)
        L.geoJSON(<?= $data->geojson ?>,{
            style : {
                color : 'white',
                fillColor : '{{ $data->warna }}',
                fillOpacity : 1.0,
            },
        }).addTo(data{{ $data->id_kecamatan }});
    @endforeach

    @foreach ($sekolah as $data)
    var iconsekolah = L.icon({
        iconUrl: '{{  asset('icon') }}/{{ $data->icon }}',
        iconSize:     [60, 60],        
    });

    var informasi = '<table class="table table-bordered"><tr><td colspan="2"><img src="{{  asset('foto') }}/{{ $data->foto }}" width="250px"></td></tr><tbody><tr><td>Nama Sekolah</td><td>: {{ $data->nama_sekolah }}</td></tr><tr><td>Jenjang</td><td>: {{ $data->jenjang }}</td></tr><tr><td>Status</td><td>: {{ $data->status }}</td></tr><tr><td colspan="2" class="text-center"><a href="/detailsekolah/{{ $data->id_sekolah }}" class="btn btn-sm btn-default">Detail</a></td></tr></tbody></table>';

     L.marker([<?= $data->posisi ?>],{icon: iconsekolah})
     .addTo(sekolah)
     .bindPopup(informasi);
   @endforeach
</script>
@endsection
