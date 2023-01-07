<nav class="nav navbar navbar-expand navbar-light dusty-grass-gradient">

  <a class="navbar-brand main-font-family" href="/"><i class="fas fa-fish fa-rotate-180"></i> BCommunity</a>

  <ul class="navbar-nav ml-auto">

    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
    </li>
    @endguest

    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">ログイン</a>
    </li>
    @endguest

    @auth
    {{-- ToDo ランキング実装予定  --}}
    <li class="nav-item">
      <a class="nav-link" href="#" data-toggle="modal" data-target="#dmaintenanceModal"><i class="fas fa-crown"></i>
      </a>
    </li>    
    {{--  ToDo 地図機能実装予定  --}}
    <li class="nav-item">
      <a class="nav-link" data-toggle="modal" data-target="#dmaintenanceModal" href="#"><i class="fas fa-map-marker-alt"></i></a>
    </li>
    {{--  新規投稿  --}}
    <li class="nav-item">
      <a class="nav-link" href="{{ route('articles.create') }}"><i class="fas fa-pen mr-1"></i></a>
    </li>
    @endauth
    
    @auth
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
                onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
          マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item">
          <i class="fas fa-user-circle"></i>
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
