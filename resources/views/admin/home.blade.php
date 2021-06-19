@extends('layouts.master')

@section('content')
<!-- BEGIN: Content -->
<div class="wrapper wrapper--top-nav">
    <div class="wrapper-box">
        <!-- BEGIN: Content -->
        <div class="content">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 xxl:col-span-9">
                    <div class="grid grid-cols-12 gap-6">
                        <!-- BEGIN: General Report -->
                        <div class="col-span-12 mt-4">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Laporan Umum
                                </h2>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-2">
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="home" class="report-box__icon text-theme-21"></i>
                                                <div class="ml-auto">
                                                    <div class="text-3xl font-bold leading-8 mt-2">
                                                        {{ count($wilayah) }}</div>
                                                    <div class="text-base text-gray-600 mt-1">Jumlah Wilayah</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="box" class="report-box__icon text-theme-22"></i>
                                                <div class="ml-auto">
                                                    <div class="text-3xl font-bold leading-8 mt-2">
                                                        {{ count($perkebunan) }}</div>
                                                    <div class="text-base text-gray-600 mt-1">Jenis Perkebunan</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="inbox" class="report-box__icon text-theme-20"></i>
                                                <div class="ml-auto">
                                                    <div class="text-3xl font-bold leading-8 mt-2">
                                                        {{ count($hasil) }}</div>
                                                    <div class="text-base text-gray-600 mt-1">Hasil Perkebunan</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="hard-drive" class="report-box__icon text-theme-10"></i>
                                                <div class="ml-auto">
                                                    <div class="text-3xl font-bold leading-8 mt-2">
                                                        {{ count($hasil) }}</div>
                                                    <div class="text-base text-gray-600 mt-1">Luas Total Perkebunan
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: General Report -->
                        <!-- BEGIN: Pemetaan Perkebunan Wilayah Kabupaten Pekalongan -->
                        <div class="col-span-12 xl:col-span-12 mt-4">
                            <div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Pemetaan Perkebunan Wilayah Kabupaten Pekalongan
                                </h2>
                            </div>
                            <div class="intro-y box p-5 mt-4">
                                <div class="maps-user mt-0 bg-gray-200 rounded-md">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                        <!-- END: Pemetaan Perkebunan Wilayah Kabupaten Pekalongan -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content -->
    @endsection
