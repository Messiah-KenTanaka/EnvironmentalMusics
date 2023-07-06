{{-- タグ検索 --}}
<ul class="navbar-nav d-flex justify-content-around mt-2 ml-auto">
  <div class="nav-item">
    <!-- dropdown -->
    <li class="nav-item dropdown text-center">
      <a class="nav-link" id="navbarDropdownTagLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search"> 最近のトレンド検索</i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownTagLink">
        @foreach($tags as $tag)
            <button class="dropdown-item py-2" type="button"
                onclick="location.href='{{ route('tags.show', ['name' => $tag->name]) }}'">
                {{ Functions::getNameTenEllipsis($tag->name) }}
            </button>
        @endforeach
      </div>
    </li>
    <!-- dropdown -->
  </div> 
</ul>
