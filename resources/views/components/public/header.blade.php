<header>

    <div id="app">

        <nav class="fixed-top d-flex flex-row justify-content-between">
            <ul class="d-md-flex flex-nowrap justify-content-start justify-content-xxl-between align-items-center p-0 m-0">
                <li class="d-none d-md-block d-xxl-none ms-2 dropdown-center align-self-center">
                    <button class="link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        experience
                    </button>
                    <ul class="dropdown-menu drop-center text-center p-0">
                        <li><a class="dropdown-item" href="{{ route('activities') }}">activities</a></li>
                        <hr class="m-0">
                        <li><a class="dropdown-item" href="{{ route('packages') }}">packages</a></li>
                    </ul>
                </li>



                <li class="d-none d-xxl-block"><a href="{{ route('homepage') }}" class="@if($) active_link @endif" aria-current="{{ $page }}">homepage</a></li>



                <li class="d-none d-xxl-block"><a href="{{ route('activities') }}">activities</a></li>
                <li class="d-none d-xxl-block"><a href="{{ route('packages') }}">packages</a></li>
            </ul>
            <div class="nav_center-logo">
                <a href="{{ route('homepage') }}" class="logo d-flex flex-column text-center flex-nowrap flex-shrink-1">
                    <div class="title d-flex flex-column">
                        MIRROR WORLD
                        <div class="festival">festival</div>
                    </div>
                    <div class="title_reflection">MIRROR WORLD</div>
                </a>
            </div>
            <ul class="d-md-flex flex-nowrap justify-content-end justify-content-xxl-between align-items-center p-0 m-0">
                <li class="d-none d-xxl-block"><a href="{{ route('about') }}">about</a></li>
                <li class="d-none d-xxl-block"><a href="{{ route('articles') }}">articles</a></li>
                <li class="d-none d-xxl-block"><a href="{{ route('contact') }}">contact</a></li>
                <li class="d-none d-md-block d-xxl-none dropdown-center">
                    <button class="link dropdown-toggle me-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        discover
                    </button>
                    <ul class="dropdown-menu text-center p-0">
                        <li><a class="dropdown-item" href="{{ route('about') }}">about</a></li>
                        <hr class="m-0">
                        <li><a class="dropdown-item" href="{{ route('articles') }}">articles</a></li>
                        <hr class="m-0">
                        <li><a class="dropdown-item" href="{{ route('contact') }}">contact</a></li>
                    </ul>
                </li>
                <li class="user_btn d-none d-md-block align-self-start">
                    @auth
                        <button class="user_icon_connected" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('media/icons/user_icon_pink_connected.svg') }}" alt="User icon">
                        </button>
                        <ul class="dropdown-menu dropdown_right text-end p-0">
                            <li class="user_name dropdown-item dropdown_right">{{ Auth::user()->first_name }}</li>
                            <hr class="m-0">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">dashboard</a></li>
                            <hr class="m-0">
                            <li><a class="dropdown-item" href="{{ route('logout') }}">logout</a></li>
                        </ul>
                    @endauth
                    @guest
                        <button class="user_icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('media/icons/user_icon.svg') }}" alt="User icon">
                        </button>
                        <ul class="dropdown-menu dropdown_right text-end p-0">
                            <li><a class="right_item dropdown-item" href="{{ route('login') }}">login</a></li>
                            <hr class="m-0">
                            <li><a class="dropdown-item" href="{{ route('account-create') }}">create account</a></li>
                        </ul>
                    @endguest
                </li>

            </ul>

            <div class="menu_container d-block d-md-none dropdown">
                <button id="menu_burger" class="d-block d-md-none me-5" type="button" data-bs-toggle="dropdown" aria-expanded="false" :class="{ open_menu : is_open }" @click="toggleMenu()">
                    <div class="menu_bar bar_1"></div>
                    <div class="menu_bar bar_2"></div>
                </button>

                <ul class="dropdown-menu dropdown_right text-end p-0 mt-3">
                    <li><a class="dropdown-item right_item" href="{{ route('homepage') }}">homepage</a></li>
                    <hr class="m-0">
                    <li><a class="dropdown-item" href="{{ route('activities') }}">activities</a></li>
                    <hr class="m-0">
                    <li><a class="dropdown-item" href="{{ route('packages') }}">packages</a></li>
                    <hr class="m-0">
                    <li><a class="dropdown-item" href="{{ route('about') }}">about</a></li>
                    <hr class="m-0">
                    <li><a class="dropdown-item" href="{{ route('articles') }}">articles</a></li>
                    <hr class="m-0">
                    <li><a class="dropdown-item" href="{{ route('contact') }}">contact</a></li>
                    <hr class="m-0">
                    @auth
                        <li class="user_name dropdown-item dropdown_right">{{ Auth::user()->first_name }}</li>
                        <hr class="m-0">
                        <li><a class="dropdown_connected dropdown-item" href="{{ route('dashboard') }}">dashboard</a></li>
                        <hr class="m-0">
                        <li><a class="dropdown_connected dropdown-item" href="{{ route('logout') }}">logout</a></li>
                    @endauth
                    @guest
                        <li><a class="right_item dropdown-item" href="{{ route('login') }}">login</a></li>
                        <hr class="m-0">
                        <li><a class="dropdown-item" href="{{ route('account-create') }}">create account</a></li>
                    @endguest
                </ul>
            </div>

        </nav>

    </div>

</header>
