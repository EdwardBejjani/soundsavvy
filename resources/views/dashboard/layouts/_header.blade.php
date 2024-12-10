<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container pt-2">
        <a href="{{route('home')}}" class="btn btn-primary nav-link px-3 py-3">
            <i class="fa-solid fa-arrow-left"></i> Back to Home
        </a>
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
            <a class="nav-link mx-2 {{Route::is('profile') ? 'active': ''}}" href="{{Route('profile', Auth::user()->user_id)}}"><i class="fa-solid fa-user"></i></a>
            <a href="{{route('logout')}}" class="btn btn-primary nav-link px-3 py-3">
                <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
            </a>
        </div>
    </div>
</nav>