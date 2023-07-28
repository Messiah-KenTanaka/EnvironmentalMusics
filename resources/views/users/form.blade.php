@csrf
<div class="d-flex align-items-center">
  <label for="image" class="cursor-pointer position-relative">
    @if ($user->image)
      <img src="{{ $user->image }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
    @else
      <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
    @endif
    <i class="fa-solid fa-camera-rotate position-absolute large-icon" style="top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
  </label>
  <input id="image" type="file" name="image" onchange="previewImage();" style="display: none;">
  <i id="arrow-icon" class="fa-solid fa-angles-right mx-3" style="display: none;"></i>
  <label for="">
    <img id="preview" src="" alt="画像プレビュー" style="display: none; width: 80px; height: 80px; object-fit: cover; border-radius: 50%;">
  </label>
</div>

<div class="form-group mt-3">
  <h2 class="h5 card-title m-0 font-weight-bold">
    <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
    {{ $user->name }}
    </a>
  </h2>
</div>
<div class="form-group">
  {{--  <label>自己紹介</label>  --}}
  <textarea name="introduction" class="form-control" rows="6" placeholder="自己紹介">{{ $user->introduction ?? old('introduction') }}</textarea>
</div>
<div class="form-group">
  <label>Youtube</label>
  <input type="text" name="youtube" class="form-control" placeholder="https://www.youtube.com/" value="{{ $user->youtube ?? old('youtube') }}">
</div>
<div class="form-group">
  <label>Twitter</label>
  <input type="text" name="twitter" class="form-control" placeholder="https://twitter.com/" value="{{ $user->twitter ?? old('twitter') }}">
</div>

<div class="form-group">
  <p id="fileName"></p>
</div>
