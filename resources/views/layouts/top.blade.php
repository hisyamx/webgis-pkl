 <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Icewall Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">
            </a>
            <a href="#" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-theme-2 py-5 hidden">
            <li>
                <a href="index.html" class="menu menu--active">
                    <div class="menu__icon"> <i data-feather="home"></i> </div>
                    <div class="menu__title">
                        Dashboard </div>
                </a>
            </li>
            <li class="side-nav__devider my-6"></li>
            <li>
                <a href="wilayah.html" class="menu">
                    <div class="menu__icon"> <i data-feather="box"></i> </div>
                    <div class="menu__title">
                        Wilayah </div>
                </a>
            </li>
            <li>
                <a href="menu-light-inbox.html" class="menu">
                    <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                    <div class="menu__title"> Perkebunan </div>
                </a>
            </li>
            <li>
                <a href="menu-light-file-manager.html" class="menu">
                    <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                    <div class="menu__title"> Hasil </div>
                </a>
            </li>
            <li class="side-nav__devider my-6"></li>
            <li>
                <a href="user.html" class="menu">
                    <div class="menu__icon"> <i data-feather="users"></i> </div>
                    <div class="menu__title">
                        Users
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="menu">
                    <div class="menu__icon"> <i data-feather="sidebar"></i> </div>
                    <div class="menu__title">
                        Forms
                        <div class="menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a href="menu-light-regular-form.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Regular Form </div>
                        </a>
                    </li>
                    <li>
                        <a href="menu-light-datepicker.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Datepicker </div>
                        </a>
                    </li>
                    <li>
                        <a href="menu-light-tail-select.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Tail Select </div>
                        </a>
                    </li>
                    <li>
                        <a href="menu-light-file-upload.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> File Upload </div>
                        </a>
                    </li>
                    <li>
                        <a href="menu-light-wysiwyg-editor.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Wysiwyg Editor </div>
                        </a>
                    </li>
                    <li>
                        <a href="menu-light-validation.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Validation </div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- END: Mobile Menu -->
    <!-- BEGIN: Top Bar -->
    <div class="top-bar-boxed border-b border-theme-2 -mt-7 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
        <div class="h-full flex items-center">
            <!-- BEGIN: Logo -->
            <a href="" class="-intro-x hidden md:flex">
                <img alt="Icewall Tailwind HTML Admin Template" class="w-6" src="{{('/assets')}}/dist/images/logo.svg">
                <span class="text-white text-sm ml-5"> <span class="font-small">GIS Perkebunan</span> Kabupaten
                    Pekalongan</span>
            </a>
            <!-- END: Logo -->
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto"> <a href="">Application</a> <i data-feather="chevron-right"
                    class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <div class="intro-x relative mr-3 sm:mr-6">
                <div class="search hidden sm:block">
                    <input type="text"
                        class="search__input form-control dark:bg-dark-1 border-transparent placeholder-theme-8"
                        placeholder="Search...">
                    <i data-feather="search" class="search__icon dark:text-gray-300"></i>
                </div>
                <a class="notification sm:hidden" href=""> <i data-feather="search"
                        class="notification__icon dark:text-gray-300"></i> </a>
            </div>
            <!-- END: Search -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                    role="button" aria-expanded="false">
                    <img alt="Icewall Tailwind HTML Admin Template" src="dist/images/profile-1.jpg">
                </div>
                <div class="dropdown-menu w-56">
                    <div class="dropdown-menu__content box bg-theme-11 dark:bg-dark-6 text-white">
                        <div class="p-4 border-b border-theme-12 dark:border-dark-3">
                            <div class="font-medium">Kevin Spacey</div>
                            <div class="text-xs text-theme-13 mt-0.5 dark:text-gray-600">DevOps Engineer</div>
                        </div>
                        <div class="p-2 border-t border-theme-12 dark:border-dark-3">
                            <a href=""
                                class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
    </div>
