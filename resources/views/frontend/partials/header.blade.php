<header class="main_menu @if(request()->is('/')) home_menu @endif">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{route('/')}}"> <img src="{{asset('frontend/dingo/img/logo.png')}}"
                                                                        alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-end"
                         id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('/')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('about.index')}}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('menu.index')}}">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('chefs.index')}}">Chefs</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{route('blogs.index')}}" id="navbarDropdown"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Blog
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('blogs.index')}}">Blog</a>
                                    <a class="dropdown-item" href="{{route('blogs.show',1)}}">Single blog</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact.index')}}">Contact</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Account
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @guest
                                        <a class="dropdown-item" href="{{route('login')}}">Login</a>
                                        <a class="dropdown-item" href="{{route('register')}}">Register</a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              class="d-none">
                                            @csrf
                                        </form>
                                        @role('admin|editor')
                                        <a class="dropdown-item" href="{{route('admin.dasboard')}}">Admin</a>
                                        @endrole
                                        @role('user')
                                        <a class="dropdown-item" href="{{route('my_profile')}}">Profile</a>
                                        @endrole
                                    @endguest
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="menu_btn">
                        <a href="#" class="btn_1 d-none d-sm-block">Book A Table</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
