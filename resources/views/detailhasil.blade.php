@extends('layouts.masteruser')

@section('content')

<div class="col-sm-6">
    <div id="map" style="width: 100%; height: 400px;"></div>
</div>

<div class="col-sm-6">
    <img src="{{ asset('storage/cover_images/' . $data->wilayah->cover_image)  }}" width="100%" height="400px">
</div>

<div class="col-sm-12">
    <br>
    <br>
    <table class="table table-bordered">
        <tr>
            <td width="170px">Nama hasil</td>
            <td width="50px">:</td>
            <td>{{ $hasil->nama }}</td>
        </tr>
        <tr>
            <td>Perkebunan</td>
            <td>:</td>
            <td>{{ $hasil->perkebunan->nama }}</td>
        </tr>
        <tr>
            <td>Wilayah</td>
            <td>:</td>
            <td>{{ $hasil->wilayah->nama }}</td>
        </tr>
        <tr>
            <td>Posisi hasil</td>
            <td>:</td>
            <td>{{ $hasil->posisi }}</td>
        </tr>
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
            center: [{{$hasil->posisi}}],
            zoom: 14,
            layers: [peta2],
        });

        var baseMaps = {
            "Grayscale": peta1,
            "Satellite": peta2,
            "Streets": peta3,
            "Dark": peta4,
        };

        L.control.layers(baseMaps).addTo(map);

        var ikonhasil = L.ikon({
            ikonUrl: '{{  asset('ikon') }}/{{ $hasil->ikon }}',
            ikonSize:     [60, 60],
        });

         L.marker([<?= $hasil->posisi ?>],{ikon: ikonhasil})
         .addTo(map);
</script>
@endsection
