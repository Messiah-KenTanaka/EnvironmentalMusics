<div class="card mt-3">
  <div class="card-body d-flex flex-row">
    <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
      @if ($article->user->image)
        <img src="{{ $article->user->image }}" class="rounded-circle mb-3" width="50" height="50">
      @else
        <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle mb-3" width="50" height="50">
      @endif
    </a>
    <div>
      <div class="font-weight-bold pl-2">
        <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
          {{ $article->user->name }}
        </a>
      </div>
      <div class="font-weight-lighter pl-2">
        {{ $article->created_at->format('Y/m/d H:i') }}
      </div>
    </div>

  @if( Auth::id() === $article->user_id )
    <!-- dropdown -->
      <div class="ml-auto card-text">
        <div class="dropdown">
          <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <button type="button" class="btn btn-link text-muted m-0 p-2">
              <i class="fas fa-ellipsis-v"></i>
            </button>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            {{--  更新はできないようにコメントアウト
            <a class="dropdown-item" href="{{ route("articles.edit", ['article' => $article]) }}">
              <i class="fas fa-pen mr-1"></i>投稿を更新する
            </a>
            <div class="dropdown-divider"></div>  --}}
            <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
              <i class="fas fa-trash-alt mr-1"></i>投稿を削除
            </a>
          </div>
        </div>
      </div>
      <!-- dropdown -->

      <!-- modal -->
      <div id="modal-delete-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header dusty-grass-gradient">
              <h5 class="modal-title" id="demoModalTitle">確認</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
              @csrf
              @method('DELETE')
              <div class="modal-body">
                {{--  {{ $article->title }}を削除します。よろしいですか？  --}}
                削除します。よろしいですか？
              </div>
              <div class="border-maintenance-modal modal-footer justify-content-between">
                <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                <button type="submit" class="btn btn-danger">削除する</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- modal -->
    @endif

  </div>
  <div class="card-body pt-0 pb-2">
    {{--  タイトルは使用しないのでコメントアウト  --}}
    {{--  <h3 class="h4 card-title">
      <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}">
        {{ $article->title }}
      </a>
    </h3>  --}}
    <div class="card-text">
      <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}">
        {!! nl2br(Functions::makeLink(e( $article->body ))) !!}
      </a>
    </div>
  </div>
  @foreach($article->tags as $tag)
    @if($loop->first)
      <div class="card-body pt-0 pb-2 pl-3">
        <div class="card-text line-height">
    @endif
          <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="p-1 mr-1 mt-1">
            {{ $tag->hashtag }}
          </a>
    @if($loop->last)
        </div>
      </div>
    @endif
  @endforeach
  @if ($article->fish_size)
    <div class="card-body pt-0 pb-2 pl-3">
      <div class="font-weight-bold pl-2">
        {{ $article->fish_size }} cm
      </div>
    </div>
  @endif
  @if ($article->image)
    <img src="{{ $article->image }}" class="img-fluid p-3">
  @endif
  <div class="card-body pt-0 pb-2 pl-3">
    <div class="card-text">
      <article-like
        :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
        :initial-count-likes='@json($article->count_likes)'
        :authorized='@json(Auth::check())'
        endpoint="{{ route('articles.like', ['article' => $article]) }}"
      >
      </article-like>
    </div>
  </div>
</div>