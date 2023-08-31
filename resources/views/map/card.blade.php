<div class="">
  <p>※タップして釣り場情報を見る</p>
  <map-field></map-field>
  <div class="mt-3">
    <p>・釣り場情報に間違いがありましたらお問い合わせにてご連絡お待ちしております。<br>
      ・フィールドエリアを追加して欲しいなどの要望がありましたら合わせてお問い合わせください。
    </p>
    <button class="btn bg-primary text-white btn-block" type="button"
      onclick="location.href='{{ route("contact.index", ["name" => Auth::user()->name]) }}'">
      <i class="fa-regular fa-envelope"></i>
      <span class="ml-1">お問い合わせ</span>
      <div class="spinner-border spinner-border-sm ml-2 d-none" role="status">
        <span class="sr-only">読み込み中...</span>
      </div>
    </button>
  </div>
</div>
