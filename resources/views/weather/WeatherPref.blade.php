{{-- 全国の天気予報検索 --}}
<a href="#" class="ranking-list-link" data-toggle="modal" data-target="#weatherModal">
  全国の天気予報検索
  <i class="fa-solid fa-angle-right"></i>
</a>

<!-- Weather Modal -->
<div class="modal fade" id="weatherModal" tabindex="-1" role="dialog" aria-labelledby="weatherModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="weatherModalLabel"><i class="fas fa-search mr-2"></i>全国の天気予報検索</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach(config('weatherPref') as $id => $pref)
        <button class="dropdown-item" type="button"
            onclick="location.href='{{ route('weather.show', ['pref' => $id]) }}'">
          <span class="ml-1">{{ $pref }}</span>
        </button>
        <div class="dropdown-divider"></div>
        @endforeach
      </div>
    </div>
  </div>
</div>
<!-- Weather Modal -->
