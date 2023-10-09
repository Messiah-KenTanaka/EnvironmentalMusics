@extends('app')

@section('title', config('app.name') . ' | ' . $field . 'ランキング | サイズ')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            @include('sidemenu')
            <div class="col">
                <div class="content-title">{{ $field }}ランキング サイズ</div>
                @include('ranking.field_search')
                @include('ranking.field_tabs', ['hasSize' => true, 'hasWeight' => false])
                @foreach ($ranking as $key => $article)
                    @include('ranking.card', ['rank' => ++$key])
                @endforeach
                {{-- @include('floatingButton') --}}
            </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
