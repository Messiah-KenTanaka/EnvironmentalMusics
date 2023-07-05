<nav class="nav navbar nav-fixed navbar-expand navbar-light dusty-grass-gradient">
  <a class="navbar-brand main-font-family" href="/">
    <img src="{{ asset('images/fish_icon.svg')}}" class="rounded-circle mr-1" width="25" height="25">
    <i>BASSER</i>
  </a>
  <ul class="navbar-nav ml-auto"> 
    @guest
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></a>
      </li>

      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <button class="dropdown-item" type="button"
            onclick="location.href='{{ route("contact.index") }}'">
            <i class="fa-regular fa-envelope"></i>
            <span class="ml-1">お問い合わせ</span>
          </button>
          <div class="dropdown-divider"></div>
          <button class="dropdown-item" type="button"
            onclick="location.href='{{ route('weather.index') }}'">
            <i class="fa-solid fa-cloud-sun"></i>
            <span class="ml-1">天気予報</span>
          </button>
        </div>
      </li>
      <!-- Dropdown -->
    @endguest
    
    @auth
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        @if (Auth::user()->image)
          <img src="{{ Auth::user()->image }}" class="rounded-circle mr-1" style="width: 25px; height: 25px; object-fit: cover;">
        @else
          <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle mr-1" style="width: 25px; height: 25px; object-fit: cover;">
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
          onclick="location.href='{{ route('weather.index') }}'">
          <i class="fa-solid fa-cloud-sun"></i>
          <span class="ml-1">天気予報</span>
        </button>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item" type="button"
          onclick="location.href='{{ route("contact.index", ["name" => Auth::user()->name]) }}'">
          <i class="fa-regular fa-envelope"></i>
          <span class="ml-1">お問い合わせ</span>
        </button>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item" type="button"
                onclick="location.href='{{ route('policy.index') }}'">
          <i class="fa-solid fa-lock"></i>
          <span class="ml-1">ポリシー</span>
        </button>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item" type="button"
                onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
          @if (Auth::user()->image)
            <img src="{{ Auth::user()->image }}" class="rounded-circle mr-2" style="width: 25px; height: 25px; object-fit: cover;">
          @else
            <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle mr-2" style="width: 25px; height: 25px; object-fit: cover;">
          @endif
          {{ Functions::getNameEllipsis(Auth::user()->name) }}
        </button>
        {{--  管理者のみ閲覧可能  --}}
        @if (in_array(Auth::user()->id, [1, 2, 3]))
          <div class="dropdown-divider"></div>
          <button class="dropdown-item" type="button"
                  onclick="location.href='{{ route('contactContent.show') }}'">
            <span class="ml-1">お問合せ内容一覧</span>
          </button>
          <div class="dropdown-divider"></div>
          <button class="dropdown-item" type="button"
                  onclick="location.href='{{ route('reportContent.show') }}'">
            <span class="ml-1">報告内容一覧</span>
          </button>
        @endif
        {{--  ここまで  --}}
      </div>
    </li>
    <form id="logout-button" method="POST" action="{{ route('logout') }}">
      @csrf
    </form>
    <!-- Dropdown -->
    @endauth
  </ul>
</nav>
