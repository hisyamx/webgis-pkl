<nav class="side-nav">
    <ul>
        <li>
            <a href="{{ route('admin.dashboard.index') }}" class="side-menu nav-link {{ request()->is('dashboard') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title">
                    Dashboard </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="{{ route('admin.wilayah.index') }}" class="side-menu nav-link {{ request()->is('wilayah') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title">
                    Wilayah
                    <div class="side-menu__sub-icon"> </div>
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.perkebunan.index') }}" class="side-menu nav-link {{ request()->is('perkebunan') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title">
                    Perkebunan
                    <div class="side-menu__sub-icon"> </div>
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.hasil.index') }}" class="side-menu nav-link {{ request()->is('hasil') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="side-menu__title">
                    Hasil
                    <div class="side-menu__sub-icon"> </div>
                </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="{{ route('admin.profile.index') }}" class="side-menu nav-link {{ request()->is('profile') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title">
                    Users
                </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="{{ route('admin.tentang.index') }}" class="side-menu nav-link {{ request()->is('tentang') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="info"></i> </div>
                <div class="side-menu__title">
                    Tentang
                </div>
            </a>
        </li>
    </ul>
</nav>
<!-- END: Side Menu -->
