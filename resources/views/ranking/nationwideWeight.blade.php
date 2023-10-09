@extends('app')

@section('title', config('app.name') . ' | 全国ランキング | ウェイト')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            @include('sidemenu')
            <div class="col">
                <div class="content-title">全国ランキング ウェイト</div>
                @include('ranking.tabs', ['hasSize' => false, 'hasWeight' => true])
                @foreach ($ranking as $key => $article)
                    @include('ranking.card', ['rank' => ++$key])
                @endforeach
                {{-- @include('floatingButton') --}}
            </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
