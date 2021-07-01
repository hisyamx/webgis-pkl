@extends('layouts.master')
@section('title','Hasil Dashboard')
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
                                <a href="{{ route('admin.hasil.create') }}">Tambah Data
                                    Hasil</a>
                            </button>
                        </div>
                    </div>
                    @include('layouts.message')
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th width="10px" class="whitespace-nowrap">No</th>
                                    <th class="text-center whitespace-nowrap">Hasil Kebun</th>
                                    <th class="text-center whitespace-nowrap">Jenis Kebun</th>
                                    <th class="text-center whitespace-nowrap">Jumlah</th>
                                    <th class="text-center whitespace-nowrap">Wilayah</th>
                                    <th class="text-center whitespace-nowrap">Tahun</th>
                                    <th class="whitespace-nowrap">Foto</th>
                                    <th class="whitespace-nowrap">Deskripsi</th>
                                    <th class="text-center whitespace-nowrap">Action</th>
                                </tr>
                            </thead>
                            <?php $no=1; ?>
                            @foreach ($hasil as $data)
                            <tbody>
                                <tr class="intro-x">
                                    <td class="whitespace-nowrap">{{ $no++ }}</td>
                                    <td>
                                        <a href="" class="text-center whitespace-nowrap">{{ $data->nama }}</a>
                                    </td>
                                    <td>
                                        <a href="" class="text-center whitespace-nowrap">{{ $data->perkebunan->nama }}</a>
                                    </td>
                                    <td class="text-center">{{ $data->jumlah }}</td>
                                    <td>
                                        <a href="" class="text-center whitespace-nowrap">{{ $data->wilayah->nama }}</a>
                                    </td>
                                    <td class="text-center">{{ $data->tahun }}</td>
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Warna" class="tooltip rounded-full"
                                                src="{{ asset('storage/cover_images/' . $data->cover_image)  }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap">{{ Str::limit($data->deskripsi, 20 )}}</td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3"
                                                href="{{ route('admin.hasil.edit', $data->id_hasil) }}"> <i
                                                    data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center text-theme-24"
                                                href="{{ route('admin.hasil.show', $data->id_hasil) }}"> <i
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


@endsection
