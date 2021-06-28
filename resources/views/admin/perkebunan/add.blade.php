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
                        <form action="{{ route('admin.perkebunan.insert') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="nama" class="form-label">Nama Perkebunan</label>
                                <input name="nama" id="nama" type="text" class="form-control"
                                    placeholder="Nama Perkebunan" value="{{ old('nama') }}">
                            </div>
                            <div class="mt-3">
                                <label for="luas" class="form-label">Luas</label>
                                <div class="grid-cols-3 gap-2">
                                    <div class="input-group">
                                        <div id="input-group-3" class="input-group-text">Hektar</div>
                                        <input type="text" class="form-control" placeholder="Luas Perkebunan"
                                        aria-describedby="input-group-12" value="{{ old('luas') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="ikon" class="form-label">Tambahkan Ikon</label>
                                <div class="intro-y box">
                                    <div id="single-file-upload" class="p-5">
                                        <div class="preview">
                                            <div class="fallback">
                                                <input name="ikon" type="file" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
