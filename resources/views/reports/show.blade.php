@extends('app')

@section('title', config('app.name') . ' | 報告内容')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        @if(in_array(Auth::id(), [1, 2, 3]))
          <h2 class="text-center main-ja-font-family mt-5">報告内容一覧</a></h2>
          @foreach($reportContents as $report)
            @include('reports.card')
          @endforeach
          @if ($reportContents->hasMorePages())
            <p class="text-center my-3"><a href="{{ $reportContents->nextPageUrl() }}">もっと見る</a></p>
          @endif
        @endif
        @include('floatingButton')
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
