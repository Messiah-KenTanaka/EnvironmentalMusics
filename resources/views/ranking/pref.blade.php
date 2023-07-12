{{-- 都道府県検索 --}}
<ul class="navbar-nav d-flex justify-content-around mt-2 ml-auto">
  <div class="nav-item">
    <!-- dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link small" id="navbarDropdownTagLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search"> 都道府県ランキング検索</i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownTagLink">
        @foreach(config('pref') as $id => $pref)
          <button class="dropdown-item" type="button"
              onclick="location.href='{{ route('ranking.show', ['pref' => $pref]) }}'">
            <span class="ml-1">{{ $pref }}</span>
          </button>
        @endforeach
      </div>
    </li>
    <!-- dropdown -->
  </div> 
</ul>
