@extends('layouts.master')
@section('title', 'Tambah Data Admin')
@section('content')
<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex items-center mt-5">
        <h2 class="text-lg font-medium mr-auto">
            Tambah Data Admin
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
                        <form action="{{ route('admin.profile.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="nama" class="form-label">Nama</label>
                                <input name="nama" id="nama" type="text" class="form-control" placeholder="Nama Kecamatan"
                                    value="{{ old('nama') }}">
                                </div>
                                <div class="mt-3">
                                    <label for="luas" class="form-label">Luas</label>
                                    <div class="grid-cols-3 gap-2">
                                        <div class="input-group">
                                        <div id="input-group-3" class="input-group-text">Hektar</div>
                                        <input type="text" class="form-control" placeholder="Luas Kecamatan"
                                            aria-describedby="input-group-12" value="{{ old('luas') }}">
                                        </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="warna" class="form-label">Warna</label>
                                <input id="cp1" name="warna" class="form-control" placeholder="Warna" value="{{ old('warna') }}">
                                {{-- <input id="cp1" type="text" class="form-control input-lg" value="{{ old('warna') }}"/> --}}
                            </div>
                            <div class="mt-3">
                                <label for="geojson" class="form-label">GeoJson</label>
                                <textarea name="geojson" id="geojson" rows="7" type="text" class="form-control" placeholder="GeoJson Kecamatan"
                                    value="{{ old('geojson') }}"></textarea>
                            </div>
                            <div class="text-right mt-5">
                                <button type="submit" class="btn btn-primary w-24">Tambah</button>
                            </div>
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

@section('page-js')
<!-- bootstrap color picker -->
{{-- <script src="{{  asset('dist') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js">
</script>
<script>
    //color picker with addon
    $('.my-colorpicker').colorpicker();
    $('.my-colorpicker').on('colorpickerChange', function (event) {
        $('.my-colorpicker .fa-square').css('color', event.color.toString());
    });
</script> --}}
<script>
  $(function () {
    $('#cp1').colorpicker();
  });
</script>
@endsection
