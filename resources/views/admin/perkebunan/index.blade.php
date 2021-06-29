@extends('layouts.master')
@section('title','Perkebunan Dashboard')
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
                            Perkebunan Kecamatan
                        </h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <button class="btn box flex items-center text-gray-700 dark:text-gray-300">
                                <a href="{{ route('admin.perkebunan.create') }}">Tambah Data
                                    Perkebunan</a>
                            </button>
                        </div>
                    </div>
                    @include('layouts.message')
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">No</th>
                                    <th class="whitespace-nowrap">Nama Perkebunan</th>
                                    <th class="whitespace-nowrap">Ikon</th>
                                    <th class="text-center whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <?php $no=1; ?>
                            @foreach ($perkebunan as $data)
                            <tbody>
                                <tr class="intro-x">
                                    <td class="whitespace-nowrap">{{ $no++ }}</td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">{{ $data->nama }}</a>
                                    </td>
                                    <td class="w-40">
                                        <div class="media align-items-center">
                                            <a href="#" class="avatar rounded-circle">
                                                <img class="h-100 w-100" alt="Image placeholder"
                                                    src="{{asset('storage/cover_images/'.$data->cover_image)}}">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3"
                                                href="{{ route('admin.perkebunan.edit', $data->id_perkebunan) }}"> <i
                                                    data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <a class="flex items-center text-theme-24"
                                                href="{{ route('admin.perkebunan.show', $data->id_perkebunan) }}"> <i
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

{{-- @foreach ($perkebunan as $data)
<div class="modal fade" id="delete{{ $data->id_perkebunan }}">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">{{ $data->perkebunan }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Ingin Hapus Data Ini?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                <a href="/perkebunan/delete/{{ $data->id_perkebunan }}" type="button"
                    class="btn btn-outline-light">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach --}}

@endsection
@section('page-css')
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
@endsection
