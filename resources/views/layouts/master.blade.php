<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{ asset('dist')}}/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Webgis Kabupaten Pekalongan, Laravel 8, Leaflet, Mapbox.">
    <meta name="author" content="webgis">
    <title>Admin @yield('title')</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('dist')}}/css/app.css" />
    <!-- END: CSS Assets-->
    <!-- Page CSS -->
    @yield('page-css')
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
    @include('layouts.mobile')
    <!-- BEGIN: Side Menu -->
    <div class="wrapper">
        <div class="wrapper-box">
        @include('layouts.header')
            @yield('content')
        </div>
    </div>
    @include('layouts.footer')
    @yield('page-js')
</body>

</html>
