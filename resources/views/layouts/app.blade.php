<!DOCTYPE html>
@php
    $user_controller = new App\Http\Controllers\UpdateUserInfoController();
    $user = $user_controller->userGetUserAvatar();
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sass/main.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>


</head>
<body>

<nav class="navigation-bar">
    <div class="container">
        <div class="row">

            <div class="menu">
                <!-- Logo -->
                <div class="logo">
                    <a class="{{ Request::is('login', '/') ? 'active' : '' }}"
                       href="{{ route('home') }}">{{ config('app.name', 'Home') }}</a>
                </div>
                <!-- Menu -->
                <ul class="navigation-menu">
                    <li class="{{ Request::is('about') ? 'active' : '' }}"><a
                                href="{{ route('about') }}">About</a></li>
                    <li class="{{ Request::is('portfolio') ? 'active' : '' }}"><a
                                href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li class="{{ Request::is('blog') ? 'active' : '' }}"><a
                                href="{{ route('blog') }}">Blog</a></li>
                    @guest
                        <ul class="register-navigation">
                            <li class="{{ Request::is('login') ? 'active' : ''}}"><a
                                        href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li class="{{ Request::is('register') ? 'active' : ''}}"><a
                                        href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        </ul>
                </ul>
                @else
                    <ul class="register-navigation">

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/admin/dashboard') }}">Admin Panel</a>

                                <a class="dropdown-item" href="{{ url('/admin/user-info') }}">User Info</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    <div class="user-avatar-block move-right align-middle">
                        <a href="#user">
                            <div class="user-avatar-top"
                                 style="background-image: url('/abyss/public/uploads/{{ auth()->user()->user_avatar }}');"></div>
                        </a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<div class="container-fluid">
    <div class="row">
        <footer>

            <div class="container">
                <div class="footer-content">
                    <div class="row">
                        <div class="col-md-3">
                            <h3>ACCUMSAN</h3>
                            <ul>
                                <li><a href="#">Nascetur nunc varius</a></li>
                                <hr>
                                <li><a href="#">Vis faucibus sed tempor</a></li>
                                <hr>
                                <li><a href="#">Massa amet lobortis vel</a></li>
                                <hr>
                                <li><a href="#">Nascetur nunc varius</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h3>FAUCIBUS</h3>
                            <ul>
                                <li><a href="#">Nascetur nunc varius</a></li>
                                <hr>
                                <li><a href="#">Vis faucibus sed tempor</a></li>
                                <hr>
                                <li><a href="#">Massa amet lobortis vel</a></li>
                                <hr>
                                <li><a href="#">Nascetur nunc varius</a></li>

                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3>ALIQUAM INTERDUM</h3>
                            <p>Blandit nunc tempor lobortis nunc non. Mi accumsan. Justo aliquet massa adipiscing
                                cubilia eu
                                accumsan id. Arcu accumsan faucibus vis ultricies adipiscing ornare ut. Mi accumsan
                                justo
                                aliquet.
                            </p>
                            <div class="footer-social">
                                <i class="fab fa-twitter-square"></i>
                                <i class="fab fa-facebook-square"></i>
                                <i class="fab fa-google-plus-g"></i>
                                <i class="fab fa-vk"></i>
                                <i class="fab fa-instagram"></i>
                            </div>
                        </div>

                        <div class="footer-bottom">
                            <ul class="copyright">
                                <li>© Untitled. All rights reserved.</li>
                                <li>Design: TEMPLATED</li>
                                <li>Images: Unsplash</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </footer>
    </div>
</div>

</body>
</html>
