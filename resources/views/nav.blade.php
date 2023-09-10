<nav id="navbar" class="nav navbar nav-fixed navbar-expand navbar-light bg-black text-white">
  <a class="navbar-brand main-font-family text-white" href="/">
    <img src="{{ asset('images/top_image02.jpg')}}" class="mr-1" style="width: 30px; height: 30px;">
    {{--  <i>BASSER</i>  --}}
  </a>
  <ul class="navbar-nav ml-auto"> 
    {{--  未ログイン  --}}
    @guest
      <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i></a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></a>
      </li>

      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <button class="dropdown-item" type="button"
            onclick="location.href='{{ route('ranking.index') }}'">
            <i class="fas fa-crown"></i>
            <span class="ml-1">ランキング</span>
          </button>
          <div class="dropdown-divider"></div>
          <button class="dropdown-item" type="button"
            onclick="location.href='{{ route('search.index') }}'">
            <i class="fa-solid fa-magnifying-glass"></i>
            <span class="ml-1">検索</span>
          </button>
          <div class="dropdown-divider"></div>
          <button class="dropdown-item" type="button"
            onclick="location.href='{{ route('map.index') }}'">
            <i class="fas fa-map-marker-alt"></i>
            <span class="ml-1">釣り場MAP</span>
          </button>
          <div class="dropdown-divider"></div>
          <button class="dropdown-item" type="button"
            onclick="location.href='{{ route('weather.index') }}'">
            <i class="fa-solid fa-cloud-sun"></i>
            <span class="ml-1">天気予報</span>
          </button>
          <div class="dropdown-divider"></div>
          <button class="dropdown-item" type="button"
            onclick="location.href='{{ route('articles.create') }}'">
            <i class="fa-solid fa-plus"></i>
            <span class="ml-1">釣果投稿</span>
          </button>
          <div class="dropdown-divider"></div>
          <button class="dropdown-item" type="button"
            onclick="location.href='{{ route("contact.index") }}'">
            <i class="fa-regular fa-envelope"></i>
            <span class="ml-1">お問い合わせ</span>
          </button>
          <div class="dropdown-divider"></div>
          <button class="dropdown-item" type="button"
                  onclick="location.href='{{ route('policy.index') }}'">
            <i class="fa-solid fa-lock"></i>
            <span class="ml-1">ポリシー</span>
          </button>
        </div>
      </li>
      <!-- Dropdown -->
    @endguest
    
    @auth
    {{--  ログイン中  --}}
    <!-- Dropdown -->
    <li class="nav-item dropdown position-relative">
      <a class="nav-link text-white" id="navbarDropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        @if (Auth::user()->image)
          <img src="{{ Auth::user()->image }}" class="rounded-circle mr-1" style="width: 25px; height: 25px; object-fit: cover;">
        @else
          <img src="{{ asset('images/noimage02.jpg')}}" class="rounded-circle mr-1" style="width: 25px; height: 25px; object-fit: cover;">
        @endif
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
                onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
          @if (Auth::user()->image)
            <img src="{{ Auth::user()->image }}" class="rounded-circle mr-3" style="width: 25px; height: 25px; object-fit: cover;">
          @else
            <img src="{{ asset('images/noimage02.jpg')}}" class="rounded-circle mr-3" style="width: 25px; height: 25px; object-fit: cover;">
          @endif
          {{ Functions::getNameTenEllipsis(Auth::user()->nickname) }}
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          <i class="fas fa-sign-in-alt"></i>
          <span class="ml-1">ログアウト</span>
        </button>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item" type="button"
          onclick="location.href='{{ route('ranking.index') }}'">
          <i class="fas fa-crown"></i>
          <span class="ml-1">ランキング</span>
        </button>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item" type="button"
          onclick="location.href='{{ route('search.index') }}'">
          <i class="fa-solid fa-magnifying-glass"></i>
          <span class="ml-1">検索</span>
        </button>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item" type="button"
          onclick="location.href='{{ route('map.index') }}'">
          <i class="fas fa-map-marker-alt"></i>
          <span class="ml-1">釣り場マップ</span>
        </button>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item" type="button"
          onclick="location.href='{{ route('weather.index') }}'">
          <i class="fa-solid fa-cloud-sun"></i>
          <span class="ml-1">天気予報</span>
        </button>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item" type="button"
          onclick="location.href='{{ route('articles.create') }}'">
          <i class="fa-solid fa-plus"></i>
          <span class="ml-1">釣果投稿</span>
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
          <div class="dropdown-divider"></div>
          <button class="dropdown-item" type="button"
                  onclick="location.href='{{ route('top.index') }}'">
            <span class="ml-1">TOP</span>
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
