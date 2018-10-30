@php
    $user_controller = new App\Http\Controllers\UpdateUserInfoController();
    $user = $user_controller->userGetUserAvatar();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sass/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/admin.js') }}" type="text/javascript"></script>
</head>
<body>
@guest
@else

    <div class="show-sidebar">
        <i class="fas fa-caret-right"></i>
    </div>

    <div class="navigation-bar-fixed">
        <div class="admin-logo move-left">
            <h3><a href="{{ route('home') }}">Abyss</a></h3>
        </div>
        <div class="user-avatar-block move-right">
            <a href="#user"><img class="user-avatar-top" style="background-image: url('/abyss/public/uploads/{{ auth()->user()->user_avatar }}');" alt=""></a></div>
        </div>


    <nav class="admin-sidebar show">
        <ul class="admin-sidebar-navigation">
            <div class="user-avatar-block">
                <div class="user-avatar-left" style="background-image: url('/abyss/public/uploads/{{ auth()->user()->user_avatar }}');"></div>
                <h3 class="user-name">{{ Auth::user()->name }}</h3>
            </div>
            <li class="static-inscription">Administration</li>
            <li {{ Request::is('/admin/dashboard') ? 'class=active' : '' }}><a href="{{ url('/admin/dashboard') }}"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
            <li class="admin-item-dropdown" {{ Request::is('/admin/posts') ? 'class=active' : '' }}><a href="{{ url('/admin/posts') }}"><i class="far fa-newspaper"></i>
                    Posts</a>
                <ul class="admin-dropdown-menu">
                     <li {{ Request::is('/admin/addposts') ? 'class=active' : '' }}><a href="{{ url('/admin/addposts') }}"><i class="fas fa-paste"></i>Add a post</a></li>
                     <li {{ Request::is('/admin/edit-posts') ? 'class=active' : '' }}><a href="{{ url('/admin/edit-posts') }}"><i class="fas fa-edit"></i>Edit posts</a></li>
                     <li {{ Request::is('/admin/post-categories') ? 'class=active' : '' }}><a href="{{ url('/admin/post-categories') }}"><i class="fab fa-cuttlefish"></i>Categories</a></li>
                </ul>
            </li>
            <li class="admin-item-dropdown" {{ Request::is('/admin/pages') ? 'class=active' : '' }}><a href="{{ url('/admin/pages') }}"><i class="fas fa-file"></i>
                    Pages</a>
                <ul class="admin-dropdown-menu">
                    <li {{ Request::is('/admin/edit-home') ? 'class=active' : '' }}><a href="{{ url('/admin/edit-home') }}"><i class="fas fa-edit"></i>Edit homepage</a></li>
                </ul>
            </li>
            <li class="static-inscription">User Administration</li>
            <li {{ Request::is('/admin/admin-settings') ? 'class=active' : '' }}><a href="{{ url('/admin/admin-settings') }}"><i class="fas fa-user"></i>Admin Settings</a></li>
            <li {{ Request::is('/admin/user-info') ? 'class=active' : '' }}><a href="{{ url('/admin/user-info') }}"><i class="fas fa-info-circle"></i>User Settings</a></li>
            <li class="static-inscription">Other Things</li>
            <li {{ Request::is('/admin/footer-settings') ? 'class=active' : '' }}><a href="{{ url('/admin/footer-settings') }}"><i class="fas fa-box"></i>Footer Settings</a></li>
            <li {{ Request::is('logout') ? 'class=active' : '' }}><a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}
                </a></li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <div class="hide-sidebar">
            <i class="fas fa-caret-left"></i>
        </div>
        @endguest
    </nav>

        <div class="admin-container">
            <main>
                @yield('content')
            </main>
        </div>

</body>
</html>