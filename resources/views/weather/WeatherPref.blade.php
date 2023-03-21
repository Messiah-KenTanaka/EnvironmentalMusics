{{-- 各地の天気検索 --}}
<ul class="navbar-nav d-flex justify-content-around mt-2 ml-auto">
  <div class="nav-item">
    <!-- dropdown -->
    <li class="nav-item dropdown text-center">
      <a class="nav-link" id="navbarDropdownTagLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search"> 全国の天気予報検索</i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownTagLink">
        @foreach(config('weatherPref') as $id => $pref)
          <button class="dropdown-item" type="button"
              onclick="location.href='{{ route('weather.show', ['pref' => $id]) }}'">
            <span class="ml-1">{{ $pref }}</span>
          </button>
        @endforeach
      </div>
    </li>
    <!-- dropdown -->
  </div> 
</ul>
