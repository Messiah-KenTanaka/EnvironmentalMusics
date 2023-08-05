{{-- フィールド検索 --}}
<a href="#" class="ranking-list-link" data-toggle="modal" data-target="#fieldModal">
  フィールドランキング検索
  <i class="fa-solid fa-angle-right"></i>
</a>

<!-- Prefecture Modal -->
<div class="modal fade" id="fieldModal" tabindex="-1" role="dialog" aria-labelledby="fieldModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="fieldModalLabel"><i class="fas fa-search mr-2"></i>フィールドランキング検索</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach(config('bassField') as $prefId => $fields)
        <h6 class="font-weight-bold">{{ config('pref')[$prefId] }}</h6>
            @foreach($fields as $fieldId => $field)
            <button class="dropdown-item" type="button"
                onclick="location.href='{{ route('ranking.field', ['field' => $field]) }}'">
                <span class="ml-1">{{ $field }}</span>
            </button>
            @endforeach
            <div class="dropdown-divider"></div>
        @endforeach
      </div>      
    </div>
  </div>
</div>
<!-- Prefecture Modal -->
