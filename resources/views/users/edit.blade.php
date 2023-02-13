@extends('app')

@section('title', config('app.name') . '/プロフィール編集')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_card_list')
            <div class="card-text mt-3">
              <form method="POST" action="{{ route('users.update', ['name' => $user->name]) }}" enctype="multipart/form-data">
                @method('PATCH')
                @include('users.form')
                <button type="submit" class="btn dusty-grass-gradient btn-block loading-btn">プロフィール更新</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @include('sidemenuRight')
    </div>
  </div>
  @include('bottomNav')
@endsection
