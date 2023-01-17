@extends('app')

@section('title', 'プロフィール編集')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_card_list')
            <div class="card-text mt-3">
              <form method="POST" action="{{ route('users.update', ['name' => $user->name]) }}" enctype="multipart/form-data">
                @method('PATCH')
                @include('users.form')
                <button type="submit" class="btn dusty-grass-gradient btn-block">プロフィール更新</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
