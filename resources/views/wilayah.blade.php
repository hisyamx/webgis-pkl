@extends('layouts.masteruser')
@section('content')

<div id="map" style="width: 100%; height: 700px;"></div>

<div class="col-sm-12">
    <br>
    <br>
    <div class="text-center"><h2><b>Data Hasil</b></h2></div>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="50px" class="text-center">No</th>
                <th class="text-center">Nama Hasil</th>
                <th width="50px" class="text-center">Perkebunan</th>
                <th class="text-center">Status</th>
                <th class="text-center">Koordinat</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($hasil as $data)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->perkebunan }}</td>
                    <td>{{ $data->status }}</td>
                    <td>{{ $data->posisi }}</td>


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




    @foreach ($perkebunan as $data)
        var perkebunan{{ $data->id_perkebunan }} = L.layerGroup();
    @endforeach

    var data{{ $kec->id_wilayah }} = L.layerGroup();

    var map = L.map('map', {
        center: [-0.932910117571772, 100.39606514807615],
        zoom: 11,
        layers: [peta2,data{{ $kec->id_wilayah }},
        @foreach ($perkebunan as $data)
            perkebunan{{ $data->id_perkebunan }},
        @endforeach
        ]
    });


    var baseMaps = {
        "Grayscale": peta1,
        "Satellite": peta2,
        "Streets": peta3,
        "Dark": peta4,
    };

    var overlayer = {
        "{{ $kec->kecamatan }}" : data{{ $kec->id_wilayah }},
        @foreach ($perkebunan as $data)
        "{{ $data->perkebunan }}" : perkebunan{{ $data->id_perkebunan }},
        @endforeach
    };



    L.control.layers(baseMaps, overlayer).addTo(map);


        var kec = L.geoJSON(<?= $kec->geojson ?>,{
            style : {
                color : 'white',
                fillColor : '{{ $kec->warna }}',
                fillOpacity : 1.0,
            },
        }).addTo(data{{ $kec->id_wilayah }});

        map.fitBounds(kec.getBounds());

    @foreach ($wilayah as $data)
    var cover_imagewilayah = L.cover_image({
        cover_imageUrl: '{{  asset('cover_image') }}/{{ $data->cover_image }}',
        cover_imageSize:     [60, 60],
    });

    var informasi = '<table class="table table-bordered"><tr><td colspan="2"><img src="{{  asset('foto') }}/{{ $data->foto }}" width="250px"></td></tr><tbody><tr><td>Nama wilayah</td><td>: {{ $data->id_wilayah }}</td></tr><tr><td>Perkebunan</td><td>: {{ $data->id_perkebunan }}</td></tr><tr><td>Jenis</td><td>: {{ $data->jenis }}</td></tr><tr><td colspan="2" class="text-center"><a href="{{ route(user.detailhasil),'$data->id_hasil' }}" class="btn btn-sm btn-default">Detail</a></td></tr></tbody></table>';

    L.marker([<?= $data->posisi ?>],{cover_image: cover_imagewilayah})
    .addTo(wilayah)
    .bindPopup(informasi);
    @endforeach

</script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
