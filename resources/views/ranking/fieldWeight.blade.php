@extends('app')

@section('title', config('app.name') . ' | ' .$field . 'ランキング | ウェイト')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        <div class="ranking-title">{{ $field }}ランキング ウェイト</div>
        @include('ranking.field_search')
        @include('ranking.field_tabs', ['hasSize' => false, 'hasWeight' => true])
        @foreach($ranking as $key => $article)
          @include('ranking.card', ['rank' => ++$key])
        @endforeach
        {{-- @include('floatingButton') --}}
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection