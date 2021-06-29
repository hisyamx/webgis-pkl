@extends('layouts.master')
@section('title','Wilayah Dashboard')
@section('content')

<!-- BEGIN: Content -->
<div class="content">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Wilayah Kecamatan
                        </h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            {{-- <button class="btn box flex items-center text-gray-700 dark:text-gray-300">
                                <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2">
                                </i>Tambah Data Wilayah
                            </button> --}}
                            <button class="btn box flex items-center text-gray-700 dark:text-gray-300">
                                <a href="{{ route('admin.wilayah.create') }}">Tambah Data
                                    Wilayah</a>
                            </button>
                        </div>
                    </div>
                    @include('layouts.message')
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">No</th>
                                    <th class="whitespace-nowrap">Wilayah Kecamatan</th>
                                    <th class="text-center whitespace-nowrap">GeoJson</th>
                                    <th class="text-center whitespace-nowrap">Luas</th>
                                    <th class="text-center whitespace-nowrap">Warna</th>
                                    <th class="text-center whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <?php $no=1; ?>
                            @foreach ($wilayah as $data)
                            <tbody>
                                <tr class="intro-x">
                                    <td class="whitespace-nowrap">{{ $no++ }}</td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">{{ $data->nama }}</a>
                                    </td>
                                    <td class="text-center">{{ Str::limit($data->geojson, 70) }}</td>
                                    <td class="text-center">{{ $data->luas }}</td>
                                    <td class="w-40" style="background-color: {{ $data->warna }}">
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3"
                                                href="{{ route('admin.wilayah.edit', $data->id_wilayah) }}"> <i
                                                    data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center text-theme-24"
                                                href="{{ route('admin.wilayah.show', $data->id_wilayah) }}"> <i
                                                    data-feather="trash-2" class="w-4 h-4 mr-1"></i> Hapus </a>
                                            {{-- <button class="btn btn-sm btn-flat btn-danger" data-feather="trash-2"
                                                class="w-4 h-4 mr-1" data-toggle="modal"
                                                data-target="#delete{{ $data->id_wilayah }}"><i class="fa fa-trash"></i>
                                            </button> --}}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <!-- END: Weekly Top Products -->
            </div>
        </div>
    </div>
</div>
<!-- END: Content -->

{{-- @foreach ($wilayah as $data)
<div class="modal fade" id="delete{{ $data->id_wilayah }}">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">{{ $data->wilayah }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Ingin Hapus Data Ini?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                <a href="{{ route('admin.wilayah.delete', $data->id_wilayah) }}" type="button" class="btn btn-outline-light">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach --}}

@endsection
