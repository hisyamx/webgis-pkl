@extends('layouts.master')
@section('title', 'Hapus Data Perkebunan')
@section('content')
<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex items-center mt-5">
        <h2 class="text-lg font-medium mr-auto">
            Hapus Data Perkebunan Kecamatan
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Hapus Data {{ $perkebunan->nama }}
                    </h2>
                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <div>
                            <label for="nama" class="form-label">Nama</label>
                            <input name="nama" id="nama" type="text" class="form-control" placeholder="Nama Kecamatan"
                                value="{{ $perkebunan->nama }}" disabled>
                        </div>
                        <div class="mt-3">
                            <label for="ikon" class="form-label">Ikon</label>
                            {{-- <div class="intro-y box">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        <img alt="ikon" class="tooltip rounded-full"
                                            src="{{asset('storage/cover_images/'.$perkebunan->cover_image)}}">
                                    </div>
                                </div>
                            </div> --}}
                            <td class="w-40">
                                <div class="flex">
                                    <div class="w-24 h-24 image-fit zoom-in">
                                        <img alt="Warna" class="tooltip rounded-full"
                                        src="{{ asset('storage/cover_images/' . $perkebunan->cover_image)  }}">
                                    </div>
                                </div>
                            </td>
                        </div>

                        {{-- <div class="text-right mt-5"> --}}
                        {{-- </div> --}}
                        <form class="" action="{{ route('admin.perkebunan.delete',$perkebunan->id_perkebunan) }}"
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
