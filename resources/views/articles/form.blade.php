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
  <select name="fish_size" class="custom-select">
    <optgroup label="サイズ">
      <option value="" disabled selected style="display:none;">サイズ</option>
      @foreach(config('fishSize') as $id => $fish_size)
        <option value="{{ $fish_size }}">{{ $fish_size }}cm</option>
      @endforeach
    </optgroup>
  </select>
</div>
<div class="form-group">
  <select name="pref" class="custom-select">
    <optgroup label="都道府県">
      <option value="" disabled selected style="display:none;">都道府県</option>
      @foreach(config('pref') as $id => $pref)
        <option value="{{ $pref }}">{{ $pref }}</option>
      @endforeach
    </optgroup>
  </select>
</div>
<div class="form-group">
  <input type="file" name="image" autocomplete="image" rows="4" value="画像を選択">
</div>