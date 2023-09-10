@csrf
<div class="align-items-center mb-2">
  <label for="background_image" class="cursor-pointer position-relative">
    @if ($user->background_image)
      <img src="{{ $user->background_image }}" class="img-fluid border-image p-3 background-image">
    @else
      <img src="{{ asset('images/background_image01.png')}}" class="img-fluid border-image p-3 background-image">
    @endif
    <i class="fa-solid fa-camera-rotate position-absolute large-icon" style="top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
  </label>
  <input id="background_image" type="file" name="background_image" onchange="previewBackgroundImage();" style="display: none;">
  <i id="arrow-icon2" class="fa-solid fa-angles-down mx-3" style="display: none;"></i>
  <label for="">
    <img id="background_preview" src="" alt="画像プレビュー" style="display: none;" class="img-fluid border-image p-3 background-image">
  </label>
</div>
<div class="form-group">
  <p id="background_fileName"></p>
</div>

<div class="d-flex align-items-center">
  <label for="image" class="cursor-pointer position-relative">
    @if ($user->image)
      <img src="{{ $user->image }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
    @else
      <img src="{{ asset('images/noimage02.jpg')}}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
    @endif
    <i class="fa-solid fa-camera-rotate position-absolute large-icon" style="top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
  </label>
  <input id="image" type="file" name="image" onchange="previewImage();" style="display: none;">
  <i id="arrow-icon" class="fa-solid fa-angles-right mx-3" style="display: none;"></i>
  <label for="">
    <img id="preview" src="" alt="画像プレビュー" style="display: none; width: 80px; height: 80px; object-fit: cover; border-radius: 50%;">
  </label>
</div>
<div class="form-group">
  <p id="fileName"></p>
</div>

<div class="form-group mt-3">
  <label>ユーザー名</label>
  <div class="text-muted">
    {{ '@' . $user->name }}
  </div>
</div>
<div class="form-group">
  <label>ニックネーム</label>
  <input type="text" name="nickname" class="form-control" placeholder="ニックネーム" value="{{ $user->nickname ?? old('nickname') }}" minlength="1" maxlength="20">
</div>
<div class="form-group">
  <label>自己紹介</label>
  <textarea name="introduction" class="form-control" rows="6" placeholder="自己紹介">{{ $user->introduction ?? old('introduction') }}</textarea>
</div>
<div class="form-group">
  <label><i class="fa-brands fa-youtube mr-2" style="color: #ff0000;"></i>Youtube：</label>
  <input type="text" name="youtube" class="form-control" placeholder="https://www.youtube.com/" value="{{ $user->youtube ?? old('youtube') }}">
</div>
<div class="form-group">
  <label><i class="fa-brands fa-square-twitter mr-2" style="color: #1d96e8;"></i>Twitter：</label>
  <input type="text" name="twitter" class="form-control" placeholder="https://twitter.com/" value="{{ $user->twitter ?? old('twitter') }}">
</div>
<div class="form-group">
  <label><i class="fa-brands fa-square-instagram mr-2" style="color: #f7695b;"></i>Instagram：</label>
  <input type="text" name="instagram" class="form-control" placeholder="https://www.instagram.com/" value="{{ $user->instagram ?? old('instagram') }}">
</div>
<div class="form-group">
  <label><i class="fa-brands fa-tiktok mr-2" style="color: #000000;"></i>TikTok：</label>
  <input type="text" name="tiktok" class="form-control" placeholder="https://www.tiktok.com/ja-JP/" value="{{ $user->tiktok ?? old('tiktok') }}">
</div>


