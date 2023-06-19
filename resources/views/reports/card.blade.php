<div class="card mt-3">
  <div class="card-body">
    <div class="card-body pt-0 pb-2">
      <p class="card-text">
        <strong>投稿のID: </strong>{{ $report->article_id }} <br>
        <strong>投稿したユーザーのID: </strong>{{ $report->article_user_id }} <br>
        <strong>報告したユーザーのID: </strong>{{ $report->user_id }} <br>
        <strong>報告の内容: </strong>{{ $report->message }} <br>
        <strong>報告の理由: </strong>{{ $report->report_reason }} <br>
        <strong>報告日時: </strong>{{ $report->created_at }}
      </p>
    </div>
  </div>
</div>
