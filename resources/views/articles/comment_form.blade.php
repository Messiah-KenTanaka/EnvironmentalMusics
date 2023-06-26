@if( Auth::id() )
  <form action="{{ route('articles.comment', ['article' => $article->id]) }}" method="POST" class="mt-3">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <input type="hidden" name="article_id" value="{{ $article->id }}">
    <div class="form-group">
        <textarea class="form-control" name="comment" rows="1" placeholder="コメントする" required></textarea>
    </div>

    <button type="submit" id="submit-btn" class="btn dusty-grass-gradient btn-block">
      <span id="submit-text">送信</span>
      <div class="spinner-border spinner-border-sm ml-2 d-none" role="status">
        <span class="sr-only">読み込み中...</span>
      </div>
    </button>
  </form>
@endif