<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container pt-2">
        <a href="{{route('home')}}" class="btn btn-primary nav-link ms-3 p-3" title="Home"><i class="fa-solid fa-house"></i></a>
        @if (Auth::user()->role == 'admin')
        <a href="{{route('admin.dashboard')}}" class="btn btn-primary nav-link mx-3 p-3" title="Dashboard"><i class="fa-solid fa-gear"></i></a>
        @elseif (Auth::user()->role == 'vendor')
        <a href="{{route('vendor.dashboard')}}" class="btn btn-primary nav-link mx-3 p-3" title="Dashboard"><i class="fa-solid fa-gear"></i></a>
        @elseif (Auth::user()->role == 'instructor')
        <a href="{{route('instructor.dashboard')}}" class="btn btn-primary nav-link mx-3 p-3" title="Dashboard"><i class="fa-solid fa-gear"></i></a>
        @endif
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav ms-auto center-menu" id="navbarNav">
            <a class="navbar-brand" href="{{route('home')}}">
                <img
                    src="{{asset('logo-and-favicon/logo-purple.png')}}"
                    alt="SoundSavvy Logo"
                    class="logo" />
            </a>
        </div>
        <div class="navbar-nav ms-auto">
            <a class="btn btn-primary nav-link p-3 {{Route::is('profile') ? 'active': ''}}" title="Profile" href="{{Route('profile', Auth::user()->user_id)}}"><i class="fa-solid fa-user"></i></a>
            <form action="{{Route('logout')}}" method="POST">
                @csrf
                <button class="btn btn-primary nav-link ms-3 p-3" title="Logout" type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        </div>
    </div>
</nav>