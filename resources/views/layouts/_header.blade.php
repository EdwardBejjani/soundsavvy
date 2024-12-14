<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{Route('home')}}">
            <img
                src="{{asset('logo-and-favicon/logo-purple.png')}}"
                alt="SoundSavvy Logo"
                class="logo" />
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto center-menu">
                <li class="nav-item">
                    <a class="nav-link {{Route::is('home') ? 'active': ''}}" href="{{Route('home')}}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Route::is('about') ? 'active': ''}}" href="{{Route('about')}}">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Route::is('shop') ? 'active': ''}}" href="{{Route('shop')}}">SHOP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Route::is('learn') ? 'active': ''}}" href="{{Route('learn')}}">LEARN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Route::is('contact') ? 'active': ''}}" href="{{Route('contact')}}">CONTACT</a>
                </li>
            </ul>
            @auth()
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="btn btn-primary nav-link px-3 py-3 {{Route::is('profile') ? 'active': ''}}" title="Profile" href="{{Route('profile', Auth::user()->user_id)}}"><i class="fa-solid fa-user"></i></a>
                </li>
                @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="btn btn-primary nav-link mx-3 px-3 py-3" title="Dashboard"><i class="fa-solid fa-gear"></i></a>
                </li>
                @elseif (Auth::user()->role == 'vendor')
                <li class="nav-item">
                    <a href="{{route('vendor.dashboard')}}" class="btn btn-primary nav-link mx-3 px-3 py-3" title="Dashboard"><i class="fa-solid fa-gear"></i></a>
                </li>
                @elseif (Auth::user()->role == 'instructor')
                <li class="nav-item">
                    <a href="{{route('instructor.dashboard')}}" class="btn btn-primary nav-link mx-3 px-3 py-3" title="Dashboard"><i class="fa-solid fa-gear"></i></a>
                </li>
                @endif
                <li>
                    <form action="{{Route('logout')}}" method="POST">
                        @csrf
                        <button class="btn btn-primary nav-link px-3 py-3" title="Logout" type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
                    </form>
                </li>
            </ul>
            @endauth
            @guest
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{Route::is('login') ? 'active': ''}}" href="{{route('login')}}">LOGIN</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary nav-link px-3 py-3" href="{{route('register')}}">REGISTER</a>
                </li>
            </ul>
            @endguest
        </div>
    </div>
</nav>