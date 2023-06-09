@extends('app')

@section('title', config('app.name') . ' | 報告')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col mt-4">
        <h2 class="text-center main-ja-font-family">報告</a></h2>
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_card_list')
            <div class="card-text">
              @include('reports.form')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
