@extends('app')

@section('title', config('app.name') . ' | お問い合わせ')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col mt-4">
        {{-- @if( Auth::id() == $user->id ) --}}
          <div class="ranking-title">
            お問い合わせ
          </div>
          <div class="card mt-3">
            <div class="card-body pt-0">
              @include('error_card_list')
              <div class="card-text">
                @include('contacts.form')
              </div>
            </div>
          </div>
        {{-- @endif --}}
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
