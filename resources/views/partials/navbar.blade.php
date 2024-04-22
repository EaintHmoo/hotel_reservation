<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{asset('hotel-logo.png')}}" alt="" width="35" height="30" class="d-inline-block align-text-top">
            <p class="text-white font-bold">Hotel Booking</p>
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
      </button>
      <div class="collapse navbar-collapse w-100 " id="navbarNavDropdown">

        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{route('frontend.booking')}}">Booking</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('room') ? 'active' : '' }}" href="{{route('frontend.room')}}">Room</a>
                </li>
            @if (Route::has('login'))
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.home') }}">
                        {{ __('Dashboard') }}
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        {{ __('Log in') }}
                    </a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                </li>
                @endif
            @endauth
            @endif
        </ul>

    </div>
    </div>

  </nav>
