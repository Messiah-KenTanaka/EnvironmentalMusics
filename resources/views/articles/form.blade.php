@csrf
{{--  <div class="md-form">
  <label>タイトル</label>
  <input type="text" name="title" class="form-control" required value="{{ $article->title ?? old('title') }}">
</div>  --}}
<div class="form-group">
  <label></label>
  <textarea name="body" required class="form-control" rows="12" placeholder="今日はどうだった...？">{{ $article->body ?? old('body') }}</textarea>
</div>
<div class="form-group">
  <article-tags-input
    :initial-tags='@json($tagNames ?? [])'
    :autocomplete-items='@json($allTagNames ?? [])'
  >
  </article-tags-input>
</div>
<div class="form-group">
  <div id="ArticleToggleButton" style="cursor: pointer;">
    <i class="fa-regular fa-pen-to-square"></i> 詳細を記載する
  </div>
  <div id="ArticleDetailDiv" style="display: none;">
    <div class="d-flex row">
      <div class="form-group col-6">
        <select name="fish_size" class="custom-select">
          <optgroup label="サイズ">
            <option value="" disabled selected style="display:none;">サイズ</option>
            @foreach(config('fishSize') as $id => $fish_size)
              <option value="{{ $fish_size }}">{{ $fish_size }}cm</option>
            @endforeach
          </optgroup>
        </select>
      </div>
      <div class="col-6">
        <input type="text" name="weight" class="form-control" placeholder="ウェイト(g)" value="{{ $article->weight ?? old('weight') }}">
      </div>
    </div>
    <div class="d-flex row">
      <div class="form-group col-6">
        <select name="pref" class="custom-select">
          <optgroup label="都道府県">
            <option value="" disabled selected style="display:none;">都道府県</option>
            @foreach(config('pref') as $id => $pref)
              <option value="{{ $pref }}">{{ $pref }}</option>
            @endforeach
          </optgroup>
        </select>
      </div>
      <div class="col-6">
        <select name="bass_field" class="custom-select">
          @foreach(config('pref') as $id => $pref)
            <optgroup label={{ $pref }}>
              <option value="" disabled selected style="display:none;">フィールド</option>
              @foreach($bassField[$keyCount++] as $field)
                <option value="{{ $field }}">{{ $field }}</option>
              @endforeach
            </optgroup>
          @endforeach
        </select>
      </div>
    </div>
  </div>
</div>
<div class="form-group">
  <input type="file" id="image" name="image" onchange="previewImage();">
</div>
<div class="form-group">
  <img id="preview" src="" alt="画像プレビュー" style="display: none; width: 100%;"/>
</div>
