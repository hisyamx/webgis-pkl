@extends('layouts.master')
@section('title', 'Tambah Tentang GIS')
@section('content')
<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex items-center mt-5">
        <h2 class="text-lg font-medium mr-auto">
            Tambah Tentang GIS Kecamatan
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Tambahkan Tentang
                    </h2>
                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <form action="{{ route('admin.tentang.store') }}" method="POST">
                        {{-- <form action="admin/tentang/insert" method="POST" enctype="multipart/form-data"> --}}
                            @csrf
                            <div class="mt-3">
                                <label for="deskripsi" class="form-label">Tentang</label>
                                <textarea name="deskripsi" id="deskripsi" rows="7" type="text" class="form-control"
                                    placeholder="Deskripsi GIS Kecamatan">{{ old('deskripsi') }}</textarea>
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
