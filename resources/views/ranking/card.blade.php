<div class="card mt-3">
  <div class="position-relative">
    @if ($article->image)
      <a href="{{ route('articles.show', ['article' => $article]) }}">
        <img src="{{ $article->image }}" class="img-fluid border-image p-3">
      </a>
      <div class="text-overlay">
        @if(isset($rank))
          @switch($rank)
            @case(1)
              <img src="{{ asset('images/ranking_1.png')}}" width="60" height="60">
              @break
            @case(2)
              <img src="{{ asset('images/ranking_2.png')}}" width="50" height="50">
              @break
            @case(3)
              <img src="{{ asset('images/ranking_3.png')}}" width="50" height="50">
              @break
            @default
              <span class="ranking-4th-place-above">{{ $rank }}</span>
          @endswitch
        @endif
      </div>
    @endif
  </div>
  <div class="card-body d-flex flex-row py-0">
    <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
      @if ($article->user->image)
        <img src="{{ $article->user->image }}" class="rounded-circle mb-1 mr-1" style="width: 50px; height: 50px; object-fit: cover;">
      @else
        <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle mb-1 mr-1" style="width: 50px; height: 50px; object-fit: cover;">
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
    @if( Auth::id() !== $article->user->id )
      <follow-button
        class="ml-auto"
        :initial-is-followed-by='@json($article->user->isFollowedBy(Auth::user()))'
        :authorized='@json(Auth::check())'
        endpoint="{{ route('users.follow', ['name' => $article->user->name]) }}"
      >
      </follow-button>
    @endif
  </div>
  <div class="d-flex">
    @if ($article->fish_size)
      <div class="py-0 pl-3">
        <i class="fa-solid fa-ruler-horizontal large-icon-120 mr-1" style="color: #f91a01;"></i>
        <span class="h2 font-black-ops-one">
          {{ $article->fish_size }}
        </span>
        cm
      </div>
    @endif

    @if ($article->weight)
      <div class="card-body py-0 pl-3">
        <i class="fa-solid fa-weight-scale large-icon-120 mr-1" style="color: #41230e;"></i>
        <span class="h2 font-black-ops-one">
          {{ number_format($article->weight) }}
        </span>
        g
      </div>
    @endif
  </div>

  @if ($article->pref || $article->bass_field)
    <div class="card-body px-3 py-2">
      <i class="fa-solid fa-location-dot mr-1" style="color: #33a853;"></i>
      @if ($article->pref)
        <a onclick="location.href='{{ route('ranking.pref', ['pref' => $article->pref]) }}'">
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

  <div class="card-body pt-0 pb-1 pl-3">
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
