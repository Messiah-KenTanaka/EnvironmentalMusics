<nav id="bottom-navbar" class="nav navbar fixed-bottom navbar-expand navbar-light bg-black text-white d-block d-xl-none">
  <ul class="navbar-nav d-flex justify-content-around ml-auto">
    {{--  ホーム  --}}
    <li class="nav-item">
      <a class="nav-link d-flex flex-column justify-content-center align-items-center text-white" href="{{ route('articles.index') }}">
        <i class="fas fa-home"></i>
        <span class="extra-small">ホーム</span>
      </a>
    </li>
    {{-- 検索 --}}
    <li class="nav-item">
      <a class="nav-link d-flex flex-column justify-content-center align-items-center text-white" href="{{ route('search.index') }}">
        <i class="fa-solid fa-magnifying-glass"></i>
        <span class="extra-small">サーチ</span>
      </a>
    </li>
    {{-- 投稿 --}}
    <li class="nav-item">
      <a href="{{ route('articles.create') }}" class="nav-link d-flex flex-column justify-content-center align-items-center text-white">
        <i class="fa-solid fa-circle-plus large-icon"></i>
      </a>
    </li>
    {{-- ランキング --}}
    <li class="nav-item">
      <a class="nav-link d-flex flex-column justify-content-center align-items-center text-white" href="{{ route('ranking.index') }}">
        <i class="fas fa-crown"></i>
        <span class="extra-small">ランキング</span>
      </a>
    </li>
    {{-- 通知 --}}
    <div class="nav-item">
      <li class="nav-item dropup">
        <a class="nav-link d-flex flex-column justify-content-center align-items-center text-white" href="{{ route('notifications') }}">
          <i class="fa-regular fa-bell"></i>
          <span class="extra-small">通知</span>
          <span class="notification-number-label">{{ $unreadNotificationsCount }}</span>
        </a>
      </li>
    </div>        

  </ul>
</nav>
