<form action="{{ url('report') }}" method="POST">
  @csrf
  <div class="form-group mt-2">
    <label for="report-reason">報告の理由</label>
      <select class="form-control" name="report_reason" id="report-reason" required>
          <option selected disabled>選択してください</option>
          <option value="1">不快な投稿</option>
          <option value="2">ハラスメントまたはいじめ</option>
          <option value="3">スパムまたは誤解を招く情報</option>
          <option value="4">偽のアカウント</option>
          <option value="5">私的な情報の公開</option>
          <option value="6">著作権侵害</option>
          <option value="7">違法な活動</option>
          <option value="8">セクシャルな内容</option>
          <option value="9">暴力的な内容</option>
          <option value="10">危険な行為</option>
          <option value="99">その他</option>
      </select>
      <label for="message" class="mt-3">詳細な内容</label>
      <textarea class="form-control" name="message" rows="15" placeholder="内容を入力してください。" required></textarea>
      <input type="hidden" name="article_id" value="{{ $report['article_id'] }}">
      <input type="hidden" name="article_user_id" value="{{ $report['article_user_id'] }}">
      <input type="hidden" name="user_id" value="{{ $report['user_id'] }}">
  </div>

  <button type="submit" id="submit-btn" class="btn dusty-grass-gradient btn-block">
    <span id="submit-text">送信する</span>
    <div class="spinner-border spinner-border-sm ml-2 d-none" role="status">
      <span class="sr-only">読み込み中...</span>
    </div>
  </button>

</form>
