@extends('layouts.master')
@section('title', 'Hapus Hasil Data Perkebunan')
@section('content')
<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex items-center mt-5">
        <h2 class="text-lg font-medium mr-auto">
            Hapus Hasil Data Perkebunan Kecamatan
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Hapus Data {{ $hasil->nama }}
                    </h2>
                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <div>
                            <label for="nama" class="form-label">Nama Hasil Perkebunan</label>
                            <input name="nama" id="nama" type="text" class="form-control" placeholder="Nama Hasil Perkebunan"
                                value="{{ $hasil->nama }}" disabled>
                        </div>
                        <div class="mt-3">
                            <label for="jenis" class="form-label">Jenis Kebun</label>
                            <input name="jenis" id="jenis" type="text" class="form-control" placeholder="Jenis Kebun"
                                value="{{ $hasil->jenis }}" disabled>
                        </div>
                        <div class="mt-3">
                            <label for="jumlah" class="form-label">Jumlah Kebun</label>
                            <input name="jumlah" id="jumlah" type="text" class="form-control" placeholder="jumlah Kebun"
                                value="{{ $hasil->jumlah }}" disabled>
                        </div>
                        <div class="mt-3">
                            <label for="id_perkebunan" class="form-label">Perkebunan</label>
                            <input name="id_perkebunan" id="id_perkebunan" type="text" class="form-control" placeholder="id_perkebunan Kebun"
                                value="{{ $hasil->perkebunan->nama }}" disabled>
                        </div>
                        <div class="mt-3">
                            <label for="id_wilayah" class="form-label">Wilayah</label>
                            <input name="id_wilayah" id="id_wilayah" type="text" class="form-control" placeholder="id_wilayah Kebun"
                                value="{{ $hasil->wilayah->nama }}" disabled>
                        </div>
                        <div class="mt-3">
                            <label for="posisi" class="form-label">Posisi Koordinat</label>
                            <input name="posisi" id="posisi" type="text" class="form-control" placeholder="posisi Kebun"
                                value="{{ $hasil->posisi }}" disabled>
                        </div>
                        <div class="mt-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input name="tahun" id="tahun" type="text" class="form-control" placeholder="tahun Kebun"
                                value="{{ $hasil->tahun }}" disabled>
                        </div>
                        <div class="mt-3">
                            <label for="tahun" class="form-label">Deskripsi</label>
                            <input name="tahun" id="tahun" type="text" class="form-control" placeholder="tahun Kebun"
                                value="{{ $hasil->deskripsi }}" disabled>
                        </div>
                        {{-- <div class="text-right mt-5"> --}}
                        {{-- </div> --}}
                        <form class="" action="{{ route('admin.hasil.delete', $hasil->id_hasil) }}"
                            method="POST">
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

{{-- @section('page-css')
<style>
    .media {
    display: flex;
    align-items: flex-start
}
.align-items-center {
    align-items: center !important
}
.avatar {
    font-size: 1rem;
    display: inline-flex;
    width: 48px;
    height: 48px;
    color: #fff;
    border-radius: .375rem;
    background-color: #adb5bd;
    align-items: center;
    justify-content: center
}
.avatar img {
    width: 100%;
    border-radius: .375rem
}
.avatar.rounded-circle img,
.rounded-circle {
    border-radius: 50% !important
}
</style>
@endsection --}}
