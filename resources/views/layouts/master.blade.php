<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{ asset('dist')}}/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Webgis Kabupaten Pekalongan, Laravel 8, Leaflet, Mapbox.">
    <meta name="keywords"
        content="admin template, Icewall Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="webgis">
    <title>@yield('title')</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('dist')}}/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="main">
    @include('layouts.top')
    <div class="wrapper">
        <div class="wrapper-box">
        @include('layouts.header')
            @yield('content')
        </div>
    </div>
    @include('layouts.footer')
</body>

</html>
