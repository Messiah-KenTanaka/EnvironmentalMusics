<form action="{{ url('contact') }}" method="POST">
  @csrf
  <div class="form-group mt-2">
      <label for="name">お名前</label>
      <input type="text" class="form-control" name="name" placeholder="釣り人" required>
  </div>
  <div class="form-group">
      <label for="email">メールアドレス</label>
      <input type="email" class="form-control" name="email" placeholder="basser@gmail.com" required>
  </div>
  <div class="form-group">
      <label for="message">お問い合わせ内容</label>
      <textarea class="form-control" name="message" rows="5" placeholder="内容を入力してください。" required></textarea>
  </div>

  <button type="submit" id="submit-btn" class="btn dusty-grass-gradient btn-block">
    <span id="submit-text">送信する</span>
    <div class="spinner-border spinner-border-sm ml-2 d-none" role="status">
      <span class="sr-only">読み込み中...</span>
    </div>
  </button>

</form>
