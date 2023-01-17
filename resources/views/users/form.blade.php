@csrf
<div class="d-flex flex-row">
  <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
  <i class="fas fa-user-circle fa-3x"></i>
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
  <input type="file" name="image" autocomplete="image" rows="4" value="画像を選択">
</div>
