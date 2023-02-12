@extends('app')

@section('title', env('APP_NAME') . '/投稿')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_card_list')
            <div class="card-text">
              <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                @include('articles.form')
                <button type="submit" class="btn dusty-grass-gradient btn-block loading-btn">投稿</button>
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
