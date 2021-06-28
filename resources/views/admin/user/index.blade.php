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
                            Administrator User Dashboard
                        </h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <button class="btn box flex items-center text-gray-700 dark:text-gray-300">
                                <a href="{{ route('admin.profile.add') }}">Tambah Data
                                    Admin</a>
                            </button>
                        </div>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">No</th>
                                    <th class="whitespace-nowrap">Foto</th>
                                    <th class="text-center whitespace-nowrap">Nama</th>
                                    <th class="text-center whitespace-nowrap">Email</th>
                                    <th class="text-center whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <?php $no=1; ?>
                            @foreach ($user as $data)
                            <tbody>
                                <tr class="intro-x">
                                    <td class="w-40">{{ $no++ }}</td>
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Warna" class="tooltip rounded-full"
                                                    src="dist/images/preview-2.jpg">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $data->nama }}</td>
                                    <td class="text-center">{{ $data->email }}</td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3"
                                                href="/user/edit/{{ $data->id }}"> <i
                                                    data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center text-theme-24"
                                                href="/user/hapus/{{ $data->id }}"> <i
                                                    data-feather="trash-2" class="w-4 h-4 mr-1"></i> Hapus </a>
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
