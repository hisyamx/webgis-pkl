@extends('layouts.master')
@section('title', 'Edit Data Perkebunan')
@section('content')
<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex items-center mt-5">
        <h2 class="text-lg font-medium mr-auto">
            Edit Data Perkebunan Kecamatan
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Edit Data {{ $perkebunan->nama }}
                    </h2>
                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <form action="{{ route('admin.perkebunan.edit', $perkebunan->id_perkebunan) }}" method="POST" enctype="multipart/form-data">
                        {{-- <form action="admin/perkebunan/insert" method="POST" enctype="multipart/form-data"> --}}
                            @csrf
                            <div>
                                <label for="nama" class="form-label">Nama</label>
                                <input name="nama" id="nama" type="text" class="form-control"
                                    placeholder="Nama Kecamatan" value="{{ $perkebunan->nama }}">
                            </div>
                            <div class="mt-3">
                                <label for="cover_image" class="form-label">Ganti Ikon (opsional)</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="cover_image">
                                </div>
                            </div>
                            {{-- <div class="text-right mt-5"> --}}
                                <button type="submit" class="btn btn-primary w-24 mt-3">Edit</button>
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

@section('page-js')
<!-- bootstrap color picker -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/css/bootstrap-colorpicker.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/js/bootstrap-colorpicker.min.js"></script>
{{-- <script>
    //color picker with addon
    $('.my-colorpicker').colorpicker();
    $('.my-colorpicker').on('colorpickerChange', function (event) {
        $('.my-colorpicker .fa-square').css('color', event.color.toString());
    });

</script> --}}
<script type="text/javascript">
  $(function () {
    $('#cp-component').colorpicker();
  });
</script>@endsection
