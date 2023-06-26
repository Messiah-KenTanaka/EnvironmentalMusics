<div class="card mt-3">
  <div class="card-body d-flex align-items-start">
    <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class="text-dark mr-3">
      @if ($comment->user->image)
        <img src="{{ $article->user->image }}" class="rounded-circle" width="50" height="50">
      @else
        <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle" width="50" height="50">
      @endif
    </a>
    <div>
      <div class="d-flex align-items-center w-100">
        <div class="font-weight-bold">
          <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class="text-dark">
            {{ $comment->user->name }}
          </a>
        </div>
        <div class="font-weight-lighter ml-2">
          {{ $comment->created_at->format('Y/m/d H:i') }}
        </div>
      </div>
      <div class="card-text pt-2">
        <p>
          {{ $comment->comment  }}
        </p>
      </div>
    </div>
  </div>
</div>
