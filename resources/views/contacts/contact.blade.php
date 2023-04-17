@extends('app')

@section('title', config('app.name') . ' | お問い合わせ')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col mt-4">
        <h2 class="text-center main-ja-font-family">お問い合わせ</a></h2>
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_card_list')
            <div class="card-text">
              @include('contacts.form')
            </div>
          </div>
        </div>
      </div>
      @include('sidemenuRight')
    </div>
  </div>
  @include('bottomNav')
@endsection
