<nav class="nav navbar fixed-bottom navbar-expand navbar-light dusty-grass-gradient d-block d-md-none">
  <ul class="navbar-nav d-flex justify-content-around ml-auto">

    {{-- ランキング --}}
    <li class="nav-item">
      <a class="nav-link" href="{{ route('ranking.index') }}"><i class="fas fa-crown"></i>
      </a>
    </li>
    
    {{--  ToDo 地図機能実装予定  --}}
    <li class="nav-item">
      <a class="nav-link" data-toggle="modal" data-target="#dmaintenanceModal" href="#"><i class="fas fa-map-marker-alt"></i></a>
    </li>
    
    {{-- タグ検索 --}}
    <div class="nav-item">
      <!-- dropup -->
      <li class="nav-item dropup">
        <a class="nav-link" id="navbarDropdownTagLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fa-solid fa-tags"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownTagLink">
          <span class="dropdown-item font-weight-bold py-2"><i class="fa-solid fa-tags mr-2"></i>人気のタグ</span>
          <div class="dropdown-divider"></div>
          @foreach($tags as $tag)
            <button class="dropdown-item" type="button"
                    onclick="location.href='{{ route('tags.show', ['name' => $tag->name]) }}'">
              <span class="ml-1">{{ Functions::getNameTenEllipsis($tag->name) }}</span>
            </button>
          @endforeach
        </div>
      </li>
      <!-- dropup -->
    </div>        
    
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
