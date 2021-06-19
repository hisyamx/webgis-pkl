@extends('layouts.master')
@section('title','User Dashboard')
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
                            Hasil Perkebunan
                        </h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <button class="btn box flex items-center text-gray-700 dark:text-gray-300">
                                <a data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2">
                                </a>Tambah Data Wilayah
                            </button>
                        </div>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th width="10px" class="text-center whitespace-nowrap">No</th>
                                    <th class="text-center whitespace-nowrap">Hasil Kebun</th>
                                    <th class="text-center whitespace-nowrap">Jenis Kebun</th>
                                    <th class="text-center whitespace-nowrap">Status</th>
                                    <th class="text-center whitespace-nowrap">Jumlah</th>
                                    <th class="text-center whitespace-nowrap">Wilayah</th>
                                    <th class="text-center whitespace-nowrap">Alamat</th>
                                    <th class="text-center whitespace-nowrap">Tahun</th>
                                    <th class="text-center whitespace-nowrap">Foto</th>
                                    <th class="text-center whitespace-nowrap">Deskripsi</th>
                                    <th class="text-center whitespace-nowrap">Action</th>
                                </tr>
                            </thead>
                            <?php $no=1; ?>
                            @foreach ($hasil as $data)
                            <tbody>
                                <tr class="intro-x">
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">{{ $data->hasil }}</a>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">{{ $data->perkebunan }}</a>
                                    </td>
                                    <td class="text-center">{{ $data->status }}</td>
                                    <td class="text-center">{{ $data->jumlah }}</td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">{{ $data->wilayah }}</a>
                                    </td>
                                    <td class="text-center">{{ $data->alamat }}</td>
                                    <td class="text-center">{{ $data->tahun }}</td>
                                    <td class="w-40" style="background-color: {{ $data->warna }}">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Warna" class="tooltip rounded-full"
                                                src="dist/images/preview-2.jpg">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $data->deskripsi }}</td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3"
                                                href="/hasil/edit/{{ $data->id_hasil }}"> <i
                                                    data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <button class="btn btn-sm btn-flat btn-danger" data-feather="trash-2"
                                                class="w-4 h-4 mr-1" data-toggle="modal"
                                                data-target="#delete{{ $data->id_hasil }}"><i class="fa fa-trash"></i>
                                            </button>
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

@foreach ($hasil as $data)
<div class="modal fade" id="delete{{ $data->id_hasil }}">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">{{ $data->hasil }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Ingin Hapus Data Ini?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                <a href="/hasil/delete/{{ $data->id_hasil }}" type="button" class="btn btn-outline-light">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach

@endsection
