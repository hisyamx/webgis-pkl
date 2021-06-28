<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{  asset('dist') }}/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register Dashboard</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{  asset('dist') }}/css/app.css" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Icewall Tailwind HTML Admin Template" class="w-6" src="{{ asset('dist')}}/images/logo.svg">
                        <span class="text-white text-sm ml-5"> <span class="font-small">GIS Perkebunan</span> Kabupaten
                    Pekalongan</span>
                    </a>
                    <div class="my-auto">
                        <img alt="Icewall Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="dist/images/illustration.svg">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Manajemen Perkebunan Web Geographic Information System
                            <br>
                            Kabupaten Pekalongan.
                        </div>
                    </div>
                </div>
                <!-- END: Register Info -->
                <!-- BEGIN: Register Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Sign Up
                        </h2>
                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="intro-x mt-8">
                                <label for="nama">{{ __('Nama') }}</label>
                                <input type="text" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" id="nama" type="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autofocus>
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="intro-x mt-8">
                                <label for="email">{{ __('Alamat Email') }}</label>
                                <input type="email" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="intro-x mt-8">
                                <label for="password">{{ __('Password') }}</label>
                                <input class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="intro-x mt-8">
                                <label for="password-confirm">{{ __('Konfirmasi Password') }}</label>
                                <input class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">{{ __('Register') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="{{('/assets')}}/dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>
