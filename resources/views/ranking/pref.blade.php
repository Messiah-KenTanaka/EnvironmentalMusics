{{-- 都道府県検索 --}}
<ul class="navbar-nav d-flex justify-content-around mt-2 ml-auto">
  <div class="nav-item">
    <!-- Modal Trigger -->
    <li class="nav-item">
      <a class="nav-link small" data-toggle="modal" data-target="#prefModal">
        <i class="fas fa-search"> 都道府県ランキング検索</i>
      </a>
    </li>
    <!-- Modal Trigger -->
  </div> 
</ul>

<!-- Prefecture Modal -->
<div class="modal fade" id="prefModal" tabindex="-1" role="dialog" aria-labelledby="prefModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="prefModalLabel"><i class="fas fa-search mr-2"></i>都道府県ランキング検索</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach(config('pref') as $id => $pref)
        <button class="dropdown-item" type="button"
            onclick="location.href='{{ route('ranking.show', ['pref' => $pref]) }}'">
          <span class="ml-1">{{ $pref }}</span>
        </button>
        <div class="dropdown-divider"></div>
        @endforeach
      </div>
    </div>
  </div>
</div>
<!-- Prefecture Modal -->
