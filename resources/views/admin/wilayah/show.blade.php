@extends('layouts.master')
@section('title', 'Hapus Data Wilayah')
@section('content')
<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex items-center mt-5">
        <h2 class="text-lg font-medium mr-auto">
            Hapus Data Wilayah Kecamatan
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Hapus Data {{ $wilayah->nama }}
                    </h2>
                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <div>
                            <label for="nama" class="form-label">Nama</label>
                            <input name="nama" id="nama" type="text" class="form-control"
                                placeholder="Nama Kecamatan" value="{{ $wilayah->nama }}" disabled>
                        </div>
                        <div class="mt-3">
                            <label for="luas" class="form-label">Luas</label>
                            <div class="grid-cols-3 gap-2">
                                <div class="input-group">
                                    <div id="input-group-3" class="input-group-text">Hektar</div>
                                    <input type="text" class="form-control" placeholder="Luas Kecamatan"
                                        aria-describedby="input-group-12" name="luas" value="{{ $wilayah->luas }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="warna" class="form-label">Warna</label>
                            {{-- <div class="form-group">
                                <label>Warna</label>
                                <div class="input-group my-colorpicker2">
                                    <input name="warna" class="form-control" placeholder="warna">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-square"></i></span>
                                    </div>
                                </div>
                            </div> --}}
                            <input id="cp-component" name="warna" class="form-control" placeholder="Warna"
                                value="{{ $wilayah->warna }}" disabled>
                            {{-- <input id="cp1" type="text" class="form-control input-lg" value="{{ old('warna') }}"/>
                            --}}
                        </div>
                        <div class="mt-3">
                            <label for="geojson" class="form-label">GeoJson</label>
                            <textarea name="geojson" id="geojson" rows="7" type="text" class="form-control"
                                placeholder="GeoJson Kecamatan" disabled>{{ $wilayah->geojson }}</textarea>
                        </div>
                        {{-- <div class="text-right mt-5"> --}}
                            {{-- </div> --}}
                        <form class="" action="{{ route('admin.wilayah.delete',$wilayah->id_wilayah) }}" method="POST">
                            @csrf
                            @method("DELETE")
                                <button type="submit" class="btn btn-danger w-24 mt-3">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content -->
<!-- bootstrap color picker -->
{{-- <script src="{{  asset('AdminLTE') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script>
    //color picker with addon
    $('.my-colorpicker2').colorpicker();
    $('.my-colorpicker2').on('colorpickerChange', function (event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

</script> --}}
@endsection
