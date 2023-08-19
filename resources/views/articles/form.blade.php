@csrf
<div class="d-flex flex-row justify-content-between align-items-center my-3">
  <div class="d-flex">
    @if (Auth::user()->image)
      <img src="{{ Auth::user()->image }}" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
    @else
      <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
    @endif
  </div>
  <button type="submit" id="submit-btn" class="rounded-pill btn bg-primary text-white p-2">
    <i class="fa-solid fa-paper-plane pr-2"></i>
    <span id="submit-text">投稿する</span>
    <div class="spinner-border spinner-border-sm ml-2 d-none" role="status">
      <span class="sr-only">読み込み中...</span>
    </div>
  </button>
</div>

<div class="row">
  <div class="col-4">
    <label id="labelImage1" class="custom-file-upload" for="image">
      <span class="number-label">1</span>
      <i class="fa-solid fa-plus"></i>
    </label>
    <input id="image" type="file" name="image" onchange="articlePreviewImage(this, 'labelImage1', 'labelImage2');" style="display: none;">
  </div>

  <div class="col-4" style="display: none;" id="uploadSection2">
    <label id="labelImage2" class="custom-file-upload" for="image2">
      <span class="number-label">2</span>
      <i class="fa-solid fa-plus"></i>
    </label>
    <input id="image2" type="file" name="image2" onchange="articlePreviewImage(this, 'labelImage2', 'labelImage3');" style="display: none;">
  </div>

  <div class="col-4" style="display: none;" id="uploadSection3">
    <label id="labelImage3" class="custom-file-upload" for="image3">
      <span class="number-label">3</span>
      <i class="fa-solid fa-plus"></i>
    </label>
    <input id="image3" type="file" name="image3" onchange="articlePreviewImage(this, 'labelImage3');" style="display: none;">
  </div>
</div>

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
  <div class="accordion" id="detailAccordion">
    <div class="card border-0">
      <div class="card-header p-0 border-0">
        <h2 class="mb-0 d-flex justify-content-center align-items-center">
          <button class="btn btn-link text-muted" id="ArticleToggleButton" type="button" data-toggle="collapse" data-target="#collapseDetail" aria-expanded="true" aria-controls="collapseDetail">
            詳細情報を入力<i class="fas fa-caret-down ml-1"></i>
          </button>
        </h2>
      </div>
      
      <div id="collapseDetail" class="collapse" aria-labelledby="headingDetail" data-parent="#detailAccordion">
        <div class="mt-2">
          <label class="form-text text-muted small">釣果:</label>
          <div class="d-flex row">
            <div class="form-group col-6">
              <input type="number" step="0.1" min="10" max="99" name="fish_size" class="form-control" placeholder="サイズ...(㎝)" value="{{ $article->fish_size ?? old('fish_size') }}">
            </div>
            <div class="col-6">
              <input type="number" max="10000" name="weight" class="form-control" placeholder="ウェイト...(g)" value="{{ $article->weight ?? old('weight') }}">
            </div>
          </div>
          <div class="d-flex row">
            <div class="form-group col-6">
              <select name="pref" class="custom-select">
                <optgroup label="都道府県">
                  <option value="" disabled selected style="display:none;">都道府県</option>
                  @foreach(config('pref') as $id => $pref)
                    <option value="{{ $pref }}" {{ (old('pref') == $pref) ? 'selected' : '' }}>{{ $pref }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
            <div class="col-6">
              <select name="bass_field" class="custom-select">
                @foreach(config('pref') as $id => $pref)
                  <optgroup label={{ $pref }}>
                    <option value="" disabled selected style="display:none;">フィールド</option>
                    @foreach($bassField[$id] as $field)
                      <option value="{{ $field }}">{{ $field }}</option>
                    @endforeach
                  </optgroup>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <label class="form-text text-muted small">釣り方:</label>
              <div class="d-flex">
                <div class="custom-control custom-radio mr-3">
                  <input type="radio" id="shore" name="fishing_type" value="1" class="custom-control-input" {{ (old('fishing_type', $article->fishing_type ?? '') == 1) ? 'checked' : '' }}>
                  <label class="custom-control-label" for="shore">おかっぱり</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="boat" name="fishing_type" value="2" class="custom-control-input" {{ (old('fishing_type', $article->fishing_type ?? '') == 2) ? 'checked' : '' }}>
                  <label class="custom-control-label" for="boat">ボート</label>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex row">
            <div class="form-group col">
              <label class="form-text text-muted small">タックル:</label>
              <input type="text" name="rod" class="form-control" placeholder="ロッド..." value="{{ $article->rod ?? old('rod') }}">
            </div>
          </div>
          <div class="d-flex row">
            <div class="form-group col">
              <input type="text" name="reel" class="form-control" placeholder="リール..." value="{{ $article->reel ?? old('reel') }}">
            </div>
          </div>
          <div class="d-flex row">
            <div class="form-group col">
              <input type="text" name="line" class="form-control" placeholder="ライン..." value="{{ $article->reel ?? old('line') }}">
            </div>
          </div>
          <div class="d-flex row">
            <div class="form-group col">
              <input type="text" name="lure" class="form-control" placeholder="ルアー..." value="{{ $article->lure ?? old('lure') }}">
            </div>
          </div>
          <div class="d-flex row">
            <div class="form-group col">
              <label class="form-text text-muted small">釣果日:</label>
              <input type="date" name="catch_date" class="form-control" value="{{ $article->catch_date ?? old('catch_date') }}">
            </div>
          </div>
          <div class="d-flex row">
            <div class="form-group col">
              <label class="form-text text-muted small">天候:</label>
              <input type="text" name="weather" class="form-control" placeholder="天気...(晴れ)" value="{{ $article->weather ?? old('weather') }}">
            </div>
          </div>
          <div class="d-flex row">
            <div class="form-group col">
              <input type="number" step="0.1" min="-50" max="50" name="temperature" class="form-control" placeholder="気温...(25.5)" value="{{ $article->temperature ?? old('temperature') }}">
            </div>
          </div>
          <div class="d-flex row">
            <div class="form-group col">
              <input type="number" step="0.1" min="-50" max="50" name="water_temperature" class="form-control" placeholder="水温...(22.2)" value="{{ $article->water_temperature ?? old('water_temperature') }}">
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
</div>