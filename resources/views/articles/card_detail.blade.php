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
          {{ $article->user->nickname }}
        </a>
      </div>
      <div class="text-muted small pl-2">
        {{ $article->created_at->diffForHumans() }}
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
                <i class="fa-solid fa-ban"></i> {{ $article->user->nickname }}さんをブロック
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
                  {{ $article->user->nickname }}さんをブロックします。よろしいですか？
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
    {{-- <div class="card-text">
      <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}">
        {!! nl2br(Functions::makeLink(e( $article->body ))) !!}
      </a>
    </div> --}}
    <article-preview :article="{{ $article }}"></article-preview>
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
  
  @if ($article->image)
    {{--  <a href="{{ route('articles.show', ['article' => $article]) }}">
      <img src="{{ $article->image }}" class="img-fluid border-image p-3">
    </a>  --}}
    <article-image :article="{{ $article }}"></article-image>
  @endif

  @if ($article->fish_size || $article->weight || $article->pref || $article->bass_field || $article->fishing_type || $article->catch_date)
    <div class="mx-3 mb-3 p-1">
      <div class="dropdown-divider"></div>
      <div class="small p-1">
        <span class="main-ja-font-family pl-1">
          [釣果データ]
        </span>
      </div>
      @if ($article->fish_size)
        <div class="small p-1">
          <span class="main-ja-font-family pl-1">
            サイズ:
            {{ $article->fish_size }}
            ㎝
          </span>
        </div>
      @endif
      @if ($article->weight)
        <div class="small p-1">
          <span class="main-ja-font-family pl-1">
            重さ:
            {{ $article->weight }}
          </span>
          g
        </div>
      @endif
      @if ($article->pref)
        <div class="small p-1">
          <span class="main-ja-font-family pl-1">
            都道府県:
            {{ $article->pref }}
          </span>
        </div>
      @endif
      @if ($article->bass_field)
        <div class="small p-1">
          <span class="main-ja-font-family pl-1">
            フィールド:
            {{ $article->bass_field }}
          </span>
        </div>
      @endif
      @if ($article->fishing_type)
        <div class="small p-1">
          <span class="main-ja-font-family pl-1">
            釣り方:
            @switch($article->fishing_type)
                @case(App\Article::FISHING_TYPE_SHORE)
                    おかっぱり
                    @break
                @case(App\Article::FISHING_TYPE_BOAT)
                    ボート
                    @break
                @default
                    {{-- 記載なし --}}
            @endswitch
          </span>
        </div>
      @endif
      @if ($article->catch_date)
        <div class="small p-1">
          <span class="main-ja-font-family pl-1">
            釣果日:
            {{ $article->catch_date }}
          </span>
        </div>
      @endif
    </div>
  @endif

  @if ($article->rod || $article->reel || $article->line || $article->lure)
    <div class="mx-3 mb-3 p-1">
      <div class="dropdown-divider"></div>
      <div class="small p-1">
        <span class="main-ja-font-family pl-1">
          [タックル]
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

  @if ($article->weather || $article->temperature || $article->water_temperature)
    <div class="mx-3 mb-3 p-1">
      <div class="dropdown-divider"></div>
      <div class="small p-1">
        <span class="main-ja-font-family pl-1">
          [状況]
        </span>
      </div>
      @if ($article->weather)
        <div class="small p-1">
          <span class="main-ja-font-family pl-1">
            天気:
            {{ $article->weather }}
          </span>
        </div>
      @endif
      @if ($article->temperature)
        <div class="small p-1">
          <span class="main-ja-font-family pl-1">
            気温:
            {{ $article->temperature }}
            ℃
          </span>
        </div>
      @endif
      @if ($article->water_temperature)
        <div class="small p-1">
          <span class="main-ja-font-family pl-1">
            水温:
            {{ $article->water_temperature }}
            ℃
          </span>
        </div>
      @endif
    </div>
  @endif

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