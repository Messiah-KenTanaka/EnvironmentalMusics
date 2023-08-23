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
    {{-- 全国MAP検索 --}}
    <div class="nav-item">
      <li class="nav-item dropup">
        <a class="nav-link d-flex flex-column justify-content-center align-items-center text-white" href="{{ route('map.index') }}">
          <i class="fas fa-map-marker-alt"></i>
          <span class="extra-small">全国マップ</span>
        </a>
      </li>
    </div>        

  </ul>
</nav>
