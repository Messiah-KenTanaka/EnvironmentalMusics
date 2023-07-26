@if( Auth::id() )
  <form action="{{ route('comment') }}" method="POST" class="mt-3">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <input type="hidden" name="article_id" value="{{ $article->id }}">
    <div class="form-group d-flex align-items-center">
      @if (Auth::user()->image)
        <img src="{{ Auth::user()->image }}" class="rounded-circle mr-2" style="width: 30px; height: 30px; object-fit: cover;">
      @else
        <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle mr-2" style="width: 30px; height: 30px; object-fit: cover;">
      @endif
      <textarea class="form-control" name="comment" rows="1" placeholder="コメントする..." required></textarea>

      <button type="submit" id="submit-btn" class="btn btn-sm rounded-pill bg-primary text-white p-2 d-flex align-items-center justify-content-center">
        <i class="fa-solid fa-paper-plane large-icon-2"></i>
        {{-- <span id="submit-text">送信</span> --}}
        <div class="spinner-border spinner-border-sm ml-2 d-none" role="status">
          <span class="sr-only">読み込み中...</span>
        </div>
      </button>

    </div>
  </form>
@endif