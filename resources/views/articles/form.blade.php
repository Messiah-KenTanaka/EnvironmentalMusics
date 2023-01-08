@csrf
{{--  <div class="md-form">
  <label>タイトル</label>
  <input type="text" name="title" class="form-control" required value="{{ $article->title ?? old('title') }}">
</div>  --}}
<div class="form-group">
  <label></label>
  <textarea name="body" required class="form-control" rows="16" placeholder="今日はどうだった？">{{ $article->body ?? old('body') }}</textarea>
</div>
<div class="form-group">
  <article-tags-input
    :initial-tags='@json($tagNames ?? [])'
    :autocomplete-items='@json($allTagNames ?? [])'
  >
  </article-tags-input>
</div>
<div class="form-group">
  <input type="file" name="image" autocomplete="image" rows="4" value="画像を選択">
</div>