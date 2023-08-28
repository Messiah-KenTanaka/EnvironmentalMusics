<nav id="bottom-navbar" class="nav navbar fixed-bottom navbar-expand navbar-light bg-black text-white d-block d-xl-none">
  <ul class="navbar-nav d-flex justify-content-around ml-auto">
    {{--  ホーム  --}}
    <li class="nav-item">
      <a class="nav-link d-flex flex-column justify-content-center align-items-center text-white" href="{{ route('articles.index') }}">
        <i class="fas fa-home large-icon-120"></i>
        <span class="extra-small">ホーム</span>
      </a>
    </li>
    {{-- ランキング --}}
    <li class="nav-item">
      <a class="nav-link d-flex flex-column justify-content-center align-items-center text-white" href="{{ route('ranking.index') }}">
        <i class="fas fa-crown large-icon-120"></i>
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
        <i class="fa-solid fa-magnifying-glass large-icon-120"></i>
        <span class="extra-small">サーチ</span>
      </a>
    </li>
    {{-- 通知 --}}
    @auth
      <div class="nav-item">
        <li class="nav-item dropup">
          <a class="nav-link d-flex flex-column justify-content-center align-items-center text-white" href="{{ route('notifications') }}">
            <i class="fa-regular fa-bell large-icon-120"></i>
            <span class="extra-small">お知らせ</span>
            @if (isset($unreadNotificationsCount) && $unreadNotificationsCount)
              <span class="notification-number-label">{{ $unreadNotificationsCount }}</span>
            @endif
          </a>
        </li>
      </div>
    @endauth
    {{--  全国<MAP></MAP>  --}}
    @guest
      <a class="nav-link d-flex flex-column justify-content-center align-items-center text-white" href="{{ route('map.index') }}">
        <i class="fas fa-map-marker-alt large-icon-120"></i>
        <span class="extra-small">全国マップ</span>
      </a>
    @endguest
  </ul>
</nav>
