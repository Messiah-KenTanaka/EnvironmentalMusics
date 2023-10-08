@extends('app')

@section('title', config('app.name') . ' | バス釣り専用SNS')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            @include('sidemenu')
            <div class="col col-xl-9 no-padding-margin">
                @include('success_text')
                @include('error_text')
                <div class="form-group">
                    <div class="image-container mt-sm-3 mb-3">
                        <top-image-slider></top-image-slider>
                    </div>
                    <a href="{{ route('articles.create') }}">
                        <label></label>
                        <div class="mx-2">
                            <div class="form-control" style="min-height: 20px;">今日の釣果はどうだった...？</div>
                        </div>
                    </a>
                </div>
                @if ($articles->currentPage() == 1)
                    @foreach ($retweetArticles as $article)
                        @include('articles.card')
                    @endforeach
                @endif
                @foreach ($articles as $article)
                    @include('articles.card')
                @endforeach
                @if ($articles->hasMorePages())
                    <p class="text-center mt-3 mb-5"><a href="{{ $articles->nextPageUrl() }}">もっと読み込む</a></p>
                @endif
                {{-- @include('floatingButton') --}}
            </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
