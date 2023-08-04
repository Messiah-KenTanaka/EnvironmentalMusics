<div class="card mt-3">
  <div class="card-body d-flex flex-row pb-0">
    <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
      @if ($article->user->image)
        <img src="{{ $article->user->image }}" class="rounded-circle mb-3 mr-1" style="width: 50px; height: 50px; object-fit: cover;">
      @else
        <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle mb-3 mr-1" style="width: 50px; height: 50px; object-fit: cover;">
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

    {{-- ログインユーザーの投稿の場合 --}}
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
              <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="demoModalTitle">確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="{{ route('articles.delete', ['article' => $article]) }}">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                  {{--  {{ $article->title }}を削除します。よろしいですか？  --}}
                  削除します。よろしいですか？
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
      
    {{-- 投稿したユーザー以外の場合 --}}
    @if( !(Auth::id() === $article->user_id) )
      {{-- 未ログインは何も表示しない --}}
      @auth
        <!-- dropdown -->
        <div class="ml-auto card-text">
          <div class="dropdown">
            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <button type="button" class="btn btn-link text-muted m-0 p-2">
                <i class="fas fa-ellipsis-v"></i>
              </button>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <form method="POST" action="{{ route('report.index', ['userId' => Auth::id()]) }}">
                @csrf
                @method('POST')
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <input type="hidden" name="article_user_id" value="{{ $article->user->id }}">
                <button class="dropdown-item" type="submit">
                  <i class="fa-regular fa-flag"></i> この投稿を報告
                </button>
              </form>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-user-block-{{ $article->user->id }}">
                <i class="fa-solid fa-ban"></i> {{ $article->user->name }}さんをブロック
              </a>
            </div>
          </div>
        </div>
        <!-- dropdown -->
        <!-- modal ユーザーブロック-->
        <div id="modal-user-block-{{ $article->user->id }}" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="demoModalTitle">確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="{{ route('users.userBlock', ['userId' => Auth::id()]) }}">
                @csrf
                @method('POST')
                <input type="hidden" name="article_user_id" value="{{ $article->user->id }}">
                <div class="modal-body">
                  {{ $article->user->name }}さんをブロックします。よろしいですか？
                </div>
                <div class="border-maintenance-modal modal-footer justify-content-between">
                  <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                  <button type="submit" class="btn btn-danger loading-btn">OK</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- modal end -->
      @endauth
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
            {{ Functions::getNameTenEllipsis($tag->hashtag) }}
          </a>
    @if($loop->last)
        </div>
      </div>
    @endif
  @endforeach
  <div class="d-flex">
    @if ($article->fish_size)
      <div class="pt-0 pb-2 pl-3">
        <span class="pl-1">
          <i class="fa-solid fa-ruler-horizontal"></i>
          {{ $article->fish_size }}
        </span>
        cm
      </div>
    @endif
    {{-- @if ($article->fish_size && $article->weight)
        <span class="lead pl-3">
          /
        </span>
    @endif --}}
    @if ($article->weight)
      <div class="card-body pt-0 pb-2 pl-3">
        <span class="pl-1">
          <i class="fa-solid fa-weight-scale"></i>
          {{ number_format($article->weight) }}
        </span>
        g
      </div>
    @endif
  </div>
  
  @if ($article->pref || $article->bass_field)
    <div class="card-body pt-0 pb-2 pl-3">
      <i class="fas fa-map-marker-alt mr-1"></i>
      @if ($article->pref)
        <a onclick="location.href='{{ route('ranking.show', ['pref' => $article->pref]) }}'">
          <small class="border border-pref p-2 mr-2">
            {{ $article->pref }}
          </small>
        </a>
      @endif
      @if ($article->bass_field)
        <a onclick="location.href='{{ route('ranking.field', ['field' => $article->bass_field]) }}'">
          <small class="border border-pref p-2">
            {{ $article->bass_field }}
          </small>
        </a>
      @endif
    </div>
  @endif
  @if ($article->image)
    <a href="{{ route('articles.show', ['article' => $article]) }}">
      <img src="{{ $article->image }}" class="img-fluid border-image p-3">
    </a>
  @endif

  @if ($article->rod || $article->reel || $article->line || $article->lure)
    <div class="article-tackle mx-3 mb-3 p-1">
      <div class="small p-1">
        <span class="main-ja-font-family pl-1">
          ータックルー
        </span>
      </div>
      @if ($article->rod)
        <div class="small p-1">
          <span class="main-ja-font-family pl-1">
            ロッド:
            {{ $article->rod }}
          </span>
        </div>
      @endif
      @if ($article->reel)
        <div class="small p-1">
          <span class="main-ja-font-family pl-1">
            リール:
            {{ $article->reel }}
          </span>
        </div>
      @endif
      @if ($article->line)
        <div class="small p-1">
          <span class="main-ja-font-family pl-1">
            ライン:
            {{ $article->line }}
          </span>
        </div>
      @endif
      @if ($article->lure)
        <div class="small p-1">
          <span class="main-ja-font-family pl-1">
            ルアー:
            {{ $article->lure }}
          </span>
        </div>
      @endif
    </div>
  @endif

  <div class="d-flex">
    @if ($article->fishing_type)
      <div class="pt-0 pb-2 pl-3">
        <span class="main-ja-font-family pl-1">
          釣り方:
          @switch($article->fishing_type)
              @case(1)
                  おかっぱり
                  @break
              @case(2)
                  ボート
                  @break
              @default
                  {{-- 記載なし --}}
          @endswitch
        </span>
      </div>
    @endif
  </div>

  <div class="d-flex">
    @if ($article->catch_date)
      <div class="pt-0 pb-2 pl-3">
        <span class="main-ja-font-family pl-1">
          釣果日:
          {{ $article->catch_date }}
        </span>
      </div>
    @endif
  </div>

  <div class="d-flex small mb-2">
    @if ($article->weather)
      <div class="pt-0 pb-2 pl-3">
        <span class="main-ja-font-family pl-1">
          天気:
          {{ $article->weather }}
        </span>
      </div>
    @endif
    @if ($article->temperature)
      <div class="pt-0 pb-2 pl-2">
        <span class="main-ja-font-family pl-1">
          気温:
          {{ $article->temperature }}
          ℃
        </span>
      </div>
    @endif
    @if ($article->water_temperature)
      <div class="pt-0 pb-2 pl-2">
        <span class="main-ja-font-family pl-1">
          水温:
          {{ $article->water_temperature }}
          ℃
        </span>
      </div>
    @endif
  </div>

  <div class="card-body pt-0 pb-2 pl-3">
    <div class="card-text d-flex">
      <article-like
        :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
        :initial-count-likes='@json($article->count_likes)'
        :authorized='@json(Auth::check())'
        endpoint="{{ route('articles.like', ['article' => $article]) }}"
      >
      </article-like>
      <div>
        <a class="btn m-0 pl-3 p-1 shadow-none text-dark" href="{{ route('articles.show', ['article' => $article]) }}">
          <i class="fa-regular fa-message mr-1"></i>
        </a>
        {{ $article->comment_count }}
      </div>
    </div>
  </div>
</div>