@extends('layouts.master')
@section('title', 'Dashboard GIS')
@section('content')
<!-- BEGIN: Content -->
<div class="content">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-4">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Admin Dashboard GIS
                        </h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-2">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="home" class="report-box__icon text-theme-21"></i>
                                        <div class="ml-auto">
                                            <div class="text-3xl font-bold leading-8 mt-2">
                                                {{ count($wilayah) }}
                                            </div>
                                            <div class="text-base text-gray-600 mt-1">Jumlah Wilayah</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="box" class="report-box__icon text-theme-22"></i>
                                        <div class="ml-auto">
                                            <div class="text-3xl font-bold leading-8 mt-2">
                                                {{ count($perkebunan) }}</div>
                                            <div class="text-base text-gray-600 mt-1">Jenis Perkebunan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="inbox" class="report-box__icon text-theme-20"></i>
                                        <div class="ml-auto">
                                            <div class="text-3xl font-bold leading-8 mt-2">
                                                {{ count($hasil) }}</div>
                                            <div class="text-base text-gray-600 mt-1">Hasil Perkebunan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="hard-drive" class="report-box__icon text-theme-10"></i>
                                        <div class="ml-auto">
                                            <div class="text-3xl font-bold leading-8 mt-2">
                                                {{ count($hasil) }}</div>
                                            <div class="text-base text-gray-600 mt-1">Luas Perkebunan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
                <!-- BEGIN: Pemetaan Perkebunan Wilayah Kabupaten Pekalongan -->
                <div class="col-span-12 xl:col-span-12 mt-4">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Pemetaan Perkebunan Wilayah Kabupaten Pekalongan
                        </h2>
                    </div>
                    <div class="intro-y box p-5 mt-4">
                        <div class="maps-user mt-0 bg-gray-200 rounded-md">
                            <div id="map" style="width: 100%; height: 100%;"></div>
                        </div>
                    </div>
                </div>
                <!-- END: Pemetaan Perkebunan Wilayah Kabupaten Pekalongan -->
            </div>
        </div>
    </div>
</div>
<!-- END: Content -->
@endsection

@section('page-js')
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
        iconUrl: '{{ asset('storage/cover_images/' . $data->wilayah->cover_image)  }}',
        iconSize:     [60, 60],
    });

    var informasi = '<table class="table table-bordered"><tr><td colspan="2"><img src="{{ asset('storage/cover_images/' . $data->cover_image)  }}" width="250px"></td></tr><tbody><tr><td>Nama Hasil Perkebunan</td><td>: {{ $data->nama }}</td></tr><tr><td>Perkebunan</td><td>: {{ $data->perkebunan->nama }}</td></tr><tr><td>Jenis</td><td>: {{ $data->jenis }}</td></tr><tr><td colspan="2" class="text-center"><a href="{{ route('user.detailhasil',$data->id_hasil) }}" class="btn btn-sm btn-default">Detail</a></td></tr></tbody></table>';


    L.marker([<?= $data->posisi ?>])
     .addTo(wilayah)
     .bindPopup(informasi);
    @endforeach
    </script>

@endsection
