<div class="d-flex flex-row mt-3">
  <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
    @if ($user->image)
        <img src="{{ $user->image }}" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
    @else
        <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
    @endif
</a>
</div>
{{-- <div class="form-group">
  <h2 class="h5 card-title m-0">
    <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
    {{ $user->name }}
    </a>
  </h2>
</div> --}}
<div class="alert alert-danger" role="alert">
  <strong>注意！</strong> アカウント削除は以下の結果をもたらします:
  <ul>
    <li>ユーザーデータはすべて物理的に削除されます。</li>
    <li>削除後のデータの復元は不可能です。</li>
    <li>投稿内容などもすべて削除されます。</li>
  </ul>
  アカウント削除は永久的で取り返しのつかない操作であることをご理解の上、進行してください。
</div>
<div class="form-group">
  <form method="POST" action="{{ route('users.deleteUser', ['userId' => Auth::id()]) }}">
    @csrf
    @method('DELETE')
    <div class="form-group mt-2">
      <label for="name">ユーザー名</label>
      <input type="text" class="form-control" name="name" placeholder="釣り人" required>
    </div>
    <div class="form-group">
      <label for="email">メールアドレス</label>
      <input type="email" class="form-control" name="email" placeholder="basser@gmail.com" required>
    </div>
    @if (!empty($user->password))
      <div class="form-group">
        <label for="password">パスワード</label>
        <input class="form-control" type="password" id="password" name="password" required>
      </div>
    @endif
    <button type="submit" id="submit-btn" class="btn bg-primary text-white btn-block">
      <span id="submit-text">削除する</span>
      <div class="spinner-border spinner-border-sm ml-2 d-none" role="status">
        <span class="sr-only">読み込み中...</span>
      </div>
    </button>
  </form>
</div>
