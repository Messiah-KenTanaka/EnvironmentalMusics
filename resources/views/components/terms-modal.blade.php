<!-- 利用規約モーダル -->
<div class="modal fade" id="{{ $id ?? 'termsModal' }}" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="{{ $id ?? 'termsModal' }}Label">利用規約</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-pre-wrap">
        @include('agreement')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn dusty-grass-gradient" data-dismiss="modal">閉じる</button>
      </div>
    </div>
  </div>
</div>
