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
  <label for="image">プロフィール画像</label><br>
  <input type="file" id="image" name="image" onchange="previewImage();">
</div>
<div class="form-group">
  <img id="preview" src="" alt="画像プレビュー" style="display: none; width: 100%;"/>
</div>
