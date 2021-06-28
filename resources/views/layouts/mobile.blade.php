<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Logo" class="w-6" src="{{ asset('dist')}}/images/logo.svg">
        </a>
        <a href="#" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-2 py-5 hidden">
        <li>
            <a href="{{ route('admin.dashboard.index') }}" class="menu menu--active">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title">
                    Dashboard </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="{{ route('admin.wilayah.index') }}" class="menu">
                <div class="menu__icon"> <i data-feather="box"></i> </div>
                <div class="menu__title">
                    Wilayah </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.perkebunan.index') }}" class="menu">
                <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="menu__title"> Perkebunan </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.hasil.index') }}" class="menu">
                <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="menu__title"> Hasil </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="{{ route('admin.profile.index') }}" class="menu">
                <div class="menu__icon"> <i data-feather="users"></i> </div>
                <div class="menu__title">
                    Users
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.tentang.index') }}" class="menu">
                <div class="menu__icon"> <i data-feather="info"></i> </div>
                <div class="menu__title">
                    Tentang
                </div>
            </a>
        </li>
    </ul>
</div>
<!-- END: Mobile Menu -->
<!-- BEGIN: Top Bar -->
<div class="top-bar-boxed border-b border-theme-2 -mt-7 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
    <div class="h-full flex items-center">
        <!-- BEGIN: Logo -->
        <a href="" class="-intro-x hidden md:flex">
            <img alt="Logo GIS" class="w-6" src="{{ asset('dist')}}/images/logo.svg">
            <span class="text-white text-sm ml-5"> <span class="font-small">GIS Perkebunan</span> Kabupaten
                Pekalongan</span>
        </a>
        <!-- END: Logo -->
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb mr-auto"> <a href="">Application</a> <i data-feather="chevron-right"
                class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                role="button" aria-expanded="false">
                <img alt="Logo GIS" src="{{ asset('dist')}}/images/profile-1.jpg">
                {{-- <img alt="Logo GIS" src="{{asset('storage/foto/')}}"> --}}
            </div>
            <div class="dropdown-menu w-56">
                <div class="dropdown-menu__content box bg-theme-11 dark:bg-dark-6 text-white">
                    <div class="p-4 border-b border-theme-12 dark:border-dark-3">
                        <div class="font-medium">{{ Auth::user()->nama }}</div>
                        <div class="text-xs text-theme-13 mt-0.5 dark:text-gray-600">{{ Auth::user()->email }}</div>
                    </div>
                    <div class="p-2 border-t border-theme-12 dark:border-dark-3">
                        <a class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i data-feather="toggle-right" class="w-4 h-4 mr-2"></i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
</div>
