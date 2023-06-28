<div class="card mt-3">
  <div class="card-body d-flex align-items-start">
    <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class="text-dark mr-3">
      @if ($comment->user->image)
        <img src="{{ $comment->user->image }}" class="rounded-circle" width="50" height="50">
      @else
        <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle" width="50" height="50">
      @endif
    </a>
    <div class="w-100">
      <div class="d-flex justify-content-between align-items-start w-100">
        <div>
          <div class="font-weight-bold">
            <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class="text-dark">
              {{ $comment->user->name }}
            </a>
          </div>
          <div class="font-weight-lighter">
            {{ $comment->created_at->format('Y/m/d H:i') }}
          </div>
        </div>
        
        {{-- ログインユーザーの投稿の場合 --}}
        @if( Auth::id() === $comment->user->id )
          <!-- dropdown -->
          <div class="card-text">
            <div class="dropdown">
              <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <button type="button" class="btn btn-link text-muted m-0 p-2">
                  <i class="fas fa-ellipsis-v"></i>
                </button>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $comment->id }}">
                  <i class="fas fa-trash-alt mr-1"></i>コメントを削除
                </a>
              </div>
            </div>
          </div>
          <!-- dropdown -->

          <!-- modal -->
          <div id="modal-delete-{{ $comment->id }}" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header dusty-grass-gradient">
                  <h5 class="modal-title" id="demoModalTitle">確認</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="{{ route('comment.delete', ['articleComment' => $comment]) }}">
                  @csrf
                  @method('PATCH')
                  <div class="modal-body">
                    コメントを削除します。よろしいですか？
                  </div>
                  <div class="border-maintenance-modal modal-footer justify-content-between">
                    <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                    <button type="submit" class="btn btn-danger loading-btn">削除する</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- modal -->
        @endif

      </div>
      <div class="card-text pt-2">
        <p>
          {{ $comment->comment  }}
        </p>
      </div>
    </div>
  </div>
</div>
