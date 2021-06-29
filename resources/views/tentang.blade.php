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
                <a href="{{ route('user.dashboard')}}" class="top-menu top-menu">
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
                <a href="{{ route('user.tentang')}}" class="top-menu top-menu--active">
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
            <div class="intro-y news xl:w-5/5 p-5 box mt-8">
            <h2 class="intro-y text-center font-large text-xl sm:text-2xl">
                Tentang GIS Kabupaten Pekalongan
            </h2>
            <div class="intro-y text-justify leading-relaxed">
                @foreach ($tentang as $data)
                <div class="intro-y text-justify leading-relaxed">
                    <p class="mb-5">{{ $data->deskripsi }}.</p>
                </div>
                @endforeach
            </div>
            <!-- END: Content -->
        </div>
    </div>
    <!-- END: Content -->
    <script src="{{ asset('dist')}}/js/app.js"></script>
    <!-- END: JS Assets-->
</body>

</html>
