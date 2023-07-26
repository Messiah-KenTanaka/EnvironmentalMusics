@extends('app')

@section('title', config('app.name') . ' | 投稿')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        <div class="mt-3 mb-5">
          <div class="card-body pt-0">
            @include('error_card_list')
            <div class="card-text">
              <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                @include('articles.form')
              </form>
            </div>
          </div>
        </div>
        @include('floatingButton')
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
