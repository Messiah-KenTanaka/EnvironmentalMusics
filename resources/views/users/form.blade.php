@csrf
<div class="d-flex flex-row">
  <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
    @if ($user->image)
        <img src="{{ $user->image }}" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
    @else
        <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
    @endif
  </a>
</div>
<div class="form-group">
  <h2 class="h5 card-title m-0">
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
  <label for="image" class="custom-file-upload">
    <i class="fas fa-cloud-upload-alt"></i> Upload Image
  </label>
  <input id="image" type="file" name="image" onchange="previewImage();" style="display: none;">
  <p id="fileName"></p>
</div>
<div class="form-group">
  <img id="preview" src="" alt="画像プレビュー" style="display: none; width: 100%;"/>
</div>
