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
              <img src="{{ asset('images/ranking_1.png')}}" width="80" height="80">
              @break
            @case(2)
              <img src="{{ asset('images/ranking_2.png')}}" width="70" height="70">
              @break
            @case(3)
              <img src="{{ asset('images/ranking_3.png')}}" width="70" height="70">
              @break
            @default
              <span class="ranking-4th-place-above">{{ $rank }}位</span>
          @endswitch
        @endif
      </div>
    @endif
  </div>
  <div class="card-body d-flex flex-row py-0">
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
  </div>
  <div class="d-flex">
    @if ($article->fish_size)
      <div class="h4 pt-0 pb-2 pl-3">
        <span class="pl-1">
          <i class="fa-solid fa-ruler-horizontal"></i>
          {{ $article->fish_size }}
        </span>
        cm
      </div>
    @endif

    @if ($article->weight)
      <div class="card-body pt-0 pb-2 pl-3">
        <span class="h4 pl-1">
          <i class="fa-solid fa-weight-scale"></i>
          {{ number_format($article->weight) }}
        </span>
        g
      </div>
    @endif
  </div>

  @if ($article->pref || $article->bass_field)
    <div class="card-body pt-0 pb-3 pl-3">
      <i class="fas fa-map-marker-alt mr-1"></i>
      @if ($article->pref)
        <a type="button"
                onclick="location.href='{{ route('ranking.show', ['pref' => $article->pref]) }}'">
          <small class="border border-pref p-2 mr-2">
            {{ $article->pref }}
          </small>
        </a>
      @endif
      @if ($article->bass_field)
        <a type="button"
                  onclick="location.href='{{ route('ranking.field', ['field' => $article->bass_field]) }}'">
          <small class="border border-pref p-2">
            {{ $article->bass_field }}
          </small>
        </a>
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
