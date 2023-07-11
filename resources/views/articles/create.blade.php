@extends('app')

@section('title', config('app.name') . ' | 投稿')

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
                <button type="submit" id="submit-btn" class="btn blue-gradient btn-block">
                  <span id="submit-text">投稿</span>
                  <div class="spinner-border spinner-border-sm ml-2 d-none" role="status">
                    <span class="sr-only">読み込み中...</span>
                  </div>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
