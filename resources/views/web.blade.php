@extends('layouts.masteruser')
@section('content')

<div id="map" style="width: 100%; height: 100%;"></div>

<script>
    var peta1 = L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11'
        });

    var peta2 = L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/satellite-v9'
        });


    var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    var peta4 = L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
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
        zoom: 11,
        layers: [peta2,
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
        "{{ $data->nama }}" : data{{ $data->id_wilayah }},
        @endforeach
        "Wilayah" : wilayah,
    };

    L.control.layers(baseMaps, overlayer).addTo(map);

    @foreach ($wilayah as $data)
        L.geoJSON(<?= $data->geojson ?>,{
            style : {
                color : 'white',
                fillColor : '{{ $data->warna }}',
                fillOpacity : 1.0,
            },
        }).addTo(data{{ $data->id_wilayah }});
    @endforeach

    @foreach ($hasil as $data)
    var cover_imagewilayah = L.icon({
        iconUrl: '{{ asset('storage/cover_images/' . $data->cover_image)  }}',
        iconSize:     [60, 60],
    });

    var informasi = '<table class="table table-bordered"><tr><td colspan="2"><img src="{{ asset('storage/cover_images/' . $data->cover_image)  }}" width="250px"></td></tr><tbody><tr><td>Nama Hasil Perkebunan</td><td>: {{ $data->nama }}</td></tr><tr><td>Perkebunan</td><td>: {{ $data->perkebunan->nama }}</td></tr><tr><td>Jenis</td><td>: {{ $data->jenis }}</td></tr><tr><td>Keterangan</td><td>: {{ $data->deskripsi }}</td></tr></tbody></table>';

    L.marker([<?= $data->posisi ?>])
     .addTo(wilayah)
     .bindPopup(informasi);
    @endforeach

</script>

@endsection
