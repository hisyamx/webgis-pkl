<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{ asset('dist')}}/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Webgis Perkebunan Kabupaten Pekalongan</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('dist')}}/css/app.css" />
    <!-- END: CSS Assets-->
    <!--Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
</head>
<!-- END: Head -->

<body class="main">
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="GIS Kabupaten Pekalongan" class="w-6" src="{{ asset('dist')}}/images/logo.svg">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-theme-2 py-5 hidden">
            <li>
                <a href="{{ route('user.dashboard')}}" class="menu menu--active">
                    <div class="menu__icon"> <i data-feather="home"></i> </div>
                    <div class="menu__title">
                        Dashboard </div>
                </a>
            </li>
            <li class="side-nav__devider my-6"></li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="box"></i> </div>
                    <div class="menu__title"> Wilayah <i data-feather="chevron-down" class="menu__sub-icon"></i>
                    </div>
                </a>
                <ul class="">
                    @foreach ($wilayah as $data)
                    <li>
                        <a href="{{ route('user.wilayah',$data->id_wilayah)}}" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> {{ $data->wilayah }} </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                    <div class="menu__title"> Perkebunan <i data-feather="chevron-down" class="menu__sub-icon"></i>
                    </div>
                </a>
                <ul class="">
                    @foreach ($perkebunan as $data)
                    <li>
                        <a href="{{ route('user.perkebunan',$data->id_perkebunan)}}" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> {{ $data->perkebunan }} </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="{{ route('user.tentang')}}" class="menu">
                    <div class="menu__icon"> <i data-feather="info"></i> </div>
                    <div class="menu__title">
                        Tentang </div>
                </a>
            </li>
        </ul>
    </div>
    <!-- END: Mobile Menu -->

    <!-- <div class="top-bar-boxed -mt-7 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-5">
        <div class="h-full flex items-center">
            <a href="" class="-intro-x hidden md:flex">
                <img alt="logo" class="w-6" src="{{ asset('dist')}}/images/logo.svg">
                <span class="text-white text-sm ml-5"> <span class="font-small">GIS Perkebunan</span> Kabupaten
                    Pekalongan</span>
            </a>
        </div>
    </div> -->

    <!-- BEGIN: Top Menu -->
    <nav class="top-nav mt-5">
        <ul>
            <li>
                <a href="{{ route('user.dashboard')}}" class="top-menu top-menu--active">
                    <div class="top-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="top-menu__title">
                        Dashboard </div>
                </a>
            </li>
            <li>
                <a href="#" class="top-menu">
                    <div class="top-menu__icon"> <i data-feather="box"></i> </div>
                    <div class="top-menu__title">
                        Wilayah <i data-feather="chevron-down" class="top-menu__sub-icon"></i></div>
                </a>
                <ul class="">
                    @foreach ($wilayah as $data)
                    <li>
                        <a href="{{ route('user.wilayah', $data->id_wilayah)}}" class="top-menu">
                            <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="top-menu__title">{{ $data->nama }}</div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="#" class="top-menu">
                    <div class="top-menu__icon"> <i data-feather="inbox"></i> </div>
                    <div class="top-menu__title"> Perkebunan <i data-feather="chevron-down"
                            class="top-menu__sub-icon"></i></div>
                </a>
                <ul class="">
                    @foreach ($perkebunan as $data)
                    <li>
                        <a href="{{ route('user.wilayah',$data->id_perkebunan)}}" class="top-menu">
                            <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="top-menu__title">{{ $data->nama }}</div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="{{ route('user.tentang')}}" class="top-menu">
                    <div class="top-menu__icon"> <i data-feather="info"></i> </div>
                    <div class="top-menu__title">
                        Tentang </div>
                </a>
            </li>
        </ul>
    </nav>
    <!-- END: Top Menu -->
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
                                        General Report
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
                                                        <div class="text-base text-gray-600 mt-1">Wilayah Kecamatan</div>
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
                                                        <div class="text-base text-gray-600 mt-1">Jenis-jenis Perkebunan</div>
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
                                                        <div class="text-base text-gray-600 mt-1">Hasil-hasil Perkebunan</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <div class="flex">
                                                    <i data-feather="hard-drive"
                                                        class="report-box__icon text-theme-10"></i>
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
                    <div class="col-span-12 xxl:col-span-3">
                        <div class="xxl:border-l border-theme-25 -mb-10 pb-10">
                            <div class="xxl:pl-6 grid grid-cols-12 gap-6">
                                <!-- BEGIN: Important Notes -->
                                <div
                                    class="col-span-12 md:col-span-6 xl:col-span-12 xl:col-start-1 xl:row-start-1 xxl:col-start-auto xxl:row-start-auto mt-3">
                                    <div class="intro-x flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-auto">
                                            Important Notes
                                        </h2>
                                        <button data-carousel="important-notes" data-target="prev"
                                            class="tiny-slider-navigator btn px-2 border-gray-400 text-gray-700 dark:text-gray-300 mr-2">
                                            <i data-feather="chevron-left" class="w-4 h-4"></i> </button>
                                        <button data-carousel="important-notes" data-target="next"
                                            class="tiny-slider-navigator btn px-2 border-gray-400 text-gray-700 dark:text-gray-300 mr-2">
                                            <i data-feather="chevron-right" class="w-4 h-4"></i> </button>
                                    </div>
                                    <div class="mt-5 intro-x">
                                        <div class="box zoom-in">
                                            <div class="tiny-slider" id="important-notes">
                                                <div class="p-5">
                                                    <div class="text-base font-medium truncate">Lorem Ipsum is simply
                                                        dummy text</div>
                                                    <div class="text-gray-500 mt-1">20 Hours ago</div>
                                                    <div class="text-gray-600 text-justify mt-1">Lorem Ipsum is simply
                                                        dummy text of the printing and typesetting industry. Lorem Ipsum
                                                        has been the industry's standard dummy text ever since the
                                                        1500s.</div>
                                                    <div class="font-medium flex mt-5">
                                                        <button type="button" class="btn btn-secondary py-1 px-2">View
                                                            Notes</button>
                                                        <button type="button"
                                                            class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                                    </div>
                                                </div>
                                                <div class="p-5">
                                                    <div class="text-base font-medium truncate">Lorem Ipsum is simply
                                                        dummy text</div>
                                                    <div class="text-gray-500 mt-1">20 Hours ago</div>
                                                    <div class="text-gray-600 text-justify mt-1">Lorem Ipsum is simply
                                                        dummy text of the printing and typesetting industry. Lorem Ipsum
                                                        has been the industry's standard dummy text ever since the
                                                        1500s.</div>
                                                    <div class="font-medium flex mt-5">
                                                        <button type="button" class="btn btn-secondary py-1 px-2">View
                                                            Notes</button>
                                                        <button type="button"
                                                            class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                                    </div>
                                                </div>
                                                <div class="p-5">
                                                    <div class="text-base font-medium truncate">Lorem Ipsum is simply
                                                        dummy text</div>
                                                    <div class="text-gray-500 mt-1">20 Hours ago</div>
                                                    <div class="text-gray-600 text-justify mt-1">Lorem Ipsum is simply
                                                        dummy text of the printing and typesetting industry. Lorem Ipsum
                                                        has been the industry's standard dummy text ever since the
                                                        1500s.</div>
                                                    <div class="font-medium flex mt-5">
                                                        <button type="button" class="btn btn-secondary py-1 px-2">View
                                                            Notes</button>
                                                        <button type="button"
                                                            class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Important Notes -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
    </div>
    <!-- END: Content -->
    <!-- BEGIN: Dark Mode Switcher-->
    <!-- <div data-url="top-menu-dark-dashboard-overview-2.html"
        class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
        <div class="dark-mode-switcher__toggle border"></div>
    </div> -->
    <!-- END: Dark Mode Switcher-->
    <!-- BEGIN: JS Assets-->
    {{-- <script
        src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script> --}}
    <script src="{{ asset('dist')}}/js/app.js"></script>
    <!-- END: JS Assets-->
</body>

</html>
