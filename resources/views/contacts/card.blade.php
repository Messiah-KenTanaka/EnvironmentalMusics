<div class="card mt-3">
  <div class="card-body">
    <div class="card-body pt-0 pb-2">
      <p class="card-text">
        <strong>ユーザーID: </strong>{{ $contact->user_id }} <br>
        <strong>ユーザー名: </strong>{{ $contact->name }} <br>
        <strong>メールアドレス: </strong>{{ $contact->email }} <br>
        <strong>お問合せの内容: </strong>{{ $contact->message }} <br>
        <strong>お問合せ日時: </strong>{{ $contact->created_at }}
      </p>
    </div>
  </div>
</div>
