@extends('layouts.master')
@section('title', 'Tambah Data Perkebunan')
@section('content')
<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex items-center mt-5">
        <h2 class="text-lg font-medium mr-auto">
            Tambah Data Perkebunan
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
                        <form action="{{ route('admin.perkebunan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="nama" class="form-label">Nama Perkebunan</label>
                                <input name="nama" id="nama" type="text" class="form-control"
                                    placeholder="Nama Perkebunan" value="{{ old('nama') }}">
                            </div>
                            <div class="mt-3">
                                <label for="cover_image" class="form-label">Tambahkan Ikon</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="cover_image">
                                </div>
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
@endsection

@section('page-css')
    <style>
        .custom-file-input {
    width: 60% !important;
    margin: 8px !important;
    opacity: 1 !important
    }

    .custom-file-input.is-valid~.custom-file-label,
    .was-validated .custom-file-input:valid~.custom-file-label {
        border-color: #2dce89
    }

    .custom-file-input.is-valid~.custom-file-label::before,
    .was-validated .custom-file-input:valid~.custom-file-label::before {
        border-color: inherit
    }

    .custom-file-input.is-valid~.valid-feedback,
    .custom-file-input.is-valid~.valid-tooltip,
    .was-validated .custom-file-input:valid~.valid-feedback,
    .was-validated .custom-file-input:valid~.valid-tooltip {
        display: block
    }

    .custom-file-input.is-valid:focus~.custom-file-label,
    .was-validated .custom-file-input:valid:focus~.custom-file-label {
        box-shadow: 0 0 0 0 rgba(45, 206, 137, .25)
    }

    .custom-file-input:focus {
        outline: 0
    }
    </style>
@endsection
