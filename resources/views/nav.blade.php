<nav class="nav navbar nav-fixed navbar-expand navbar-light dusty-grass-gradient">

  <a class="navbar-brand main-font-family" href="/">BASSER</a>

  <ul class="navbar-nav ml-auto">

    {{--  ToDo 地図機能実装予定  --}}
    <li class="nav-item">
      <a class="nav-link" data-toggle="modal" data-target="#dmaintenanceModal" href="#"><i class="fas fa-map-marker-alt"></i></a>
    </li>
    
    {{-- ランキング --}}
    <li class="nav-item">
      <a class="nav-link" href="{{ route('ranking.index') }}"><i class="fas fa-crown"></i>
      </a>
    </li>

    {{-- タグ検索 --}}
    <li class="nav-item">
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link" id="navbarDropdownTagLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownTagLink">
          <span class="dropdown-item font-weight-bold py-2">人気のタグ</span>
          <div class="dropdown-divider"></div>
          @foreach($tags as $tag)
            <button class="dropdown-item" type="button"
                    onclick="location.href='{{ route('tags.show', ['name' => $tag->name]) }}'">
              <span class="ml-1">{{ Functions::getNameTenEllipsis($tag->name) }}</span>
            </button>
          @endforeach
        </div>
      </li>
      <!-- Dropdown -->
    </li>        
    
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
    {{--  新規投稿  --}}
    <li class="nav-item">
      <a class="nav-link" href="{{ route('articles.create') }}"><i class="fa-solid fa-fish"></i></a>
    </li>
    @endauth
    
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

{{-- メンテナンスモーダルダイアログ --}}
<div class="modal fade" id="dmaintenanceModal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header dusty-grass-gradient">
              <h5 class="modal-title" id="demoModalTitle">確認</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              メンテナンス中です。
          </div>
          <div class="border-maintenance-modal modal-footer">
              <button type="button" class="btn dusty-grass-gradient" data-dismiss="modal">閉じる</button>
          </div>
      </div>
  </div>
</div>
