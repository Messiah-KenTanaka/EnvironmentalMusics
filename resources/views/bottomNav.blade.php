<nav class="nav navbar fixed-bottom navbar-expand navbar-light bg-black text-white d-block d-xl-none">
  <ul class="navbar-nav d-flex justify-content-around ml-auto">
    {{--  ホーム  --}}
    <li class="nav-item">
      <a class="nav-link d-flex flex-column justify-content-center align-items-center text-white" href="{{ route('articles.index') }}">
        <i class="fas fa-home"></i>
        <span class="extra-small">ホーム</span>
      </a>
    </li>
    {{-- ランキング --}}
    <li class="nav-item">
      <a class="nav-link d-flex flex-column justify-content-center align-items-center text-white" href="{{ route('ranking.index') }}">
        <i class="fas fa-crown"></i>
        <span class="extra-small">ランキング</span>
      </a>
    </li>
    {{-- 投稿 --}}
    <li class="nav-item">
      <a href="{{ route('articles.create') }}" class="nav-link d-flex flex-column justify-content-center align-items-center text-white">
        <i class="fa-solid fa-circle-plus large-icon"></i>
      </a>
    </li>
    {{-- 検索 --}}
    <li class="nav-item">
      <a class="nav-link d-flex flex-column justify-content-center align-items-center text-white" href="{{ route('search.index') }}">
        <i class="fa-solid fa-magnifying-glass"></i>
        <span class="extra-small">サーチ</span>
      </a>
    </li>
    {{-- タグ検索 --}}
    <div class="nav-item">
      <!-- dropup -->
      <li class="nav-item dropup">
        <a class="nav-link d-flex flex-column justify-content-center align-items-center text-white" id="navbarDropdownTagLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bolt"></i>
          <span class="extra-small">トレンド</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownTagLink">
          <span class="dropdown-item font-weight-bold py-2"><i class="fas fa-bolt mr-2"></i>最近のトレンド</span>
          <div class="dropdown-divider"></div>
          @foreach($tags as $tag)
            <button class="dropdown-item" type="button"
                    onclick="location.href='{{ route('tags.show', ['name' => $tag->name]) }}'">
              <span class="ml-1">{{ Functions::getNameFifteenEllipsis($tag->name) }}</span>
            </button>
          @endforeach
        </div>
      </li>
      <!-- dropup -->
    </div>        
    
    {{--  @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i></a>
    </li>
    @endguest

    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></a>
    </li>
    @endguest  --}}

    {{--  @auth
    <li class="nav-item">
      <a class="nav-link" href="{{ route('articles.create') }}"><i class="fa-solid fa-fish"></i></a>
    </li>
    @endauth  --}}

  </ul>
</nav>

{{-- メンテナンスモーダルダイアログ --}}
<div class="modal fade" id="dmaintenanceModal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header bg-primary text-white">
              <h5 class="modal-title" id="demoModalTitle">確認</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              メンテナンス中です。
          </div>
          <div class="border-maintenance-modal modal-footer">
              <button type="button" class="btn bg-primary text-white" data-dismiss="modal">閉じる</button>
          </div>
      </div>
  </div>
</div>
