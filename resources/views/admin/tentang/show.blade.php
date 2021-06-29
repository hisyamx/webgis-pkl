@extends('layouts.master')
@section('title', 'Hapus Data Tentang GIS')
@section('content')
<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex items-center mt-5">
        <h2 class="text-lg font-medium mr-auto">
            Hapus Data Tentang GIS
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Hapus Data {{ $tentang->id }}
                    </h2>
                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <div>
                            <label for="nama" class="form-label">Deskripsi</label>
                            <input name="nama" id="nama" type="text" class="form-control"
                                placeholder="Nama Kecamatan" value="{{ $tentang->deskripsi }}" disabled>
                        </div>
                        <form class="" action="{{ route('admin.tentang.delete',$tentang->id) }}" method="POST">
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
