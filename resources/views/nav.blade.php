<nav class="nav navbar nav-fixed navbar-expand navbar-light dusty-grass-gradient">
  <a class="navbar-brand main-font-family" href="/">BASSER_β</a>
  <ul class="navbar-nav ml-auto"> 
    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i></a>
    </li>
    @endguest

    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></a>
    </li>
    @endguest
    
    @auth
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        @if (Auth::user()->image)
          <img src="{{ Auth::user()->image }}" class="rounded-circle mr-1" width="25" height="25">
        @else
          <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle mr-1" width="25" height="25">
        @endif
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
                onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
          <i class="fas fa-user-alt"></i>
          <span class="ml-1">マイページ</span>
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          <i class="fas fa-sign-in-alt"></i>
          <span class="ml-1">ログアウト</span>
        </button>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item" type="button"
                onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
          @if (Auth::user()->image)
            <img src="{{ Auth::user()->image }}" class="rounded-circle mr-2" width="25" height="25">
          @else
            <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle mr-2" width="25" height="25">
          @endif
          {{ Functions::getNameEllipsis(Auth::user()->name) }}
        </button>
      </div>
    </li>
    <form id="logout-button" method="POST" action="{{ route('logout') }}">
      @csrf
    </form>
    <!-- Dropdown -->
    @endauth
  </ul>
</nav>
