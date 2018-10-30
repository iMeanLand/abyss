<aside class="sidebar">
    <div class="sidebar-header">
        @guest
            <h3>Hello World</h3>
        @else
            <h3>Admin Sidebar</h3>
        @endguest
    </div>
    <div class="sidebar-content">
        <ul class="sidebar-list">
            @guest
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Home Page</a></li>
                <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About Us</a></li>
                <li class="{{ Request::is('portfolio') ? 'active' : '' }}"><a
                            href="{{ route('portfolio') }}">Portfolio</a></li>
                <li class="{{ Request::is('register') ? 'active' : '' }}"><a href="{{ route('register') }}">Register</a>
                </li>
                <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ route('login') }}">Login</a></li>
            @else
                <li {{ Request::is('/admin/dashboard') ? 'class=active' : '' }}><a href="{{ url('/admin/dashboard') }}">Admin
                        Panel</a></li>

                <li {{ Request::is('/admin/user-info') ? 'class=active' : '' }}><a href="{{ url('/admin/user-info') }}">User
                        Settings</a></li>

                <li {{ Request::is('logout') ? 'class=active' : '' }}><a href="{{ route('logout') }}"
                                                                         onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a></li>
            @endguest
        </ul>
    </div>
</aside>
