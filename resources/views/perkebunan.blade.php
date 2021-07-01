@extends('layouts.masteruser')
@section('content')

<div id="map" style="width: 100%; height: 700px;"></div>
<div class="col-sm-12">
    <br>
    <br>
    <div class="text-center"><h2><b>Data hasil {{ $title }}</b></h2></div>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="50px" class="text-center">No</th>
                <th class="text-center">Nama hasil</th>
                <th width="50px" class="text-center">Perkebunan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($hasil as $data)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->perkebunan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
        center: [-7.031013404745716, 109.62808439037346],
        zoom: 11,
        layers: [peta2]
    });


    var baseMaps = {
        "Grayscale": peta1,
        "Satellite": peta2,
        "Streets": peta3,
        "Dark": peta4,
    };



    L.control.layers(baseMaps).addTo(map);

    @foreach($kecamatan as $data)
    L.geoJSON(<?= $data->geojson ?>, {
        style: {
            color: 'white',
            fillColor: '{{ $data->warna }}',
            fillOpacity: 1.0,
        },
    }).addTo(map);
    @endforeach
@foreach ($hasil as $data)
var iconhasil = L.icon({
    iconUrl: '{{  asset('icon') }}/{{ $data->icon }}',
    iconSize:     [60, 60],
});
var informasi = '<table class="table table-bordered"><tr><td colspan="2"><img src="{{  asset('foto') }}/{{ $data->foto }}" width="250px"></td></tr><tbody><tr><td>Nama hasil</td><td>: {{ $data->nama_hasil }}</td></tr><tr><td>perkebunan</td><td>: {{ $data->perkebunan }}</td></tr><tr><td>Status</td><td>: {{ $data->status }}</td></tr><tr><td colspan="2" class="text-center"><a href="/detailhasil/{{ $data->id_hasil }}" class="btn btn-sm btn-default">Detail</a></td></tr></tbody></table>';
    L.marker([{{ $data->posisi }}],{icon:iconhasil})
    .addTo(map)
    .bindPopup(informasi);
@endforeach
</script>
@endsection
