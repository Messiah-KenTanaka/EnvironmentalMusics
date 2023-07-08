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
        <input type="number" step="0.1" min="10" max="99" name="fish_size" class="form-control" placeholder="サイズ(㎝)" value="{{ $article->fish_size ?? old('fish_size') }}">
      </div>
      <div class="col-6">
        <input type="number" max="10000" name="weight" class="form-control" placeholder="ウェイト(g)" value="{{ $article->weight ?? old('weight') }}">
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
    <div class="d-flex row">
      <div class="form-group col">
        <input type="text" name="rod" class="form-control" placeholder="ロッド" value="{{ $article->rod ?? old('rod') }}">
      </div>
    </div>
    <div class="d-flex row">
      <div class="form-group col">
        <input type="text" name="reel" class="form-control" placeholder="リール" value="{{ $article->reel ?? old('reel') }}">
      </div>
    </div>
    <div class="d-flex row">
      <div class="form-group col">
        <input type="text" name="line" class="form-control" placeholder="ライン" value="{{ $article->reel ?? old('line') }}">
      </div>
    </div>
    <div class="d-flex row">
      <div class="form-group col">
        <input type="text" name="lure" class="form-control" placeholder="ルアー" value="{{ $article->lure ?? old('lure') }}">
      </div>
    </div>
    <div class="d-flex row">
      <div class="form-group col">
        <input type="text" name="weather" class="form-control" placeholder="天気" value="{{ $article->weather ?? old('weather') }}">
      </div>
    </div>
    <div class="d-flex row">
      <div class="form-group col">
        <input type="number" step="0.1" min="-50" max="50" name="temperature" class="form-control" placeholder="気温" value="{{ $article->temperature ?? old('temperature') }}">
      </div>
    </div>
    <div class="d-flex row">
      <div class="form-group col">
        <input type="number" step="0.1" min="-50" max="50" name="water_temperature" class="form-control" placeholder="水温" value="{{ $article->water_temperature ?? old('water_temperature') }}">
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
