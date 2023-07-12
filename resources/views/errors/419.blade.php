@extends('app')

@section('title', config('app.name') . ' | 419エラー')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <h1 class="text-center"><a class="text-dark main-font-family" href="/">BCommunity</a></h1>
                <h5 class="text-center"><a class="text-dark main-font-family" href="/">~BASSER~</a></h5>
                <div class="card mt-3">
                    <div class="card-header">{{ __('419 Error') }}</div>
                    <div class="card-body">
                        {{ __('申し訳ありませんが、お探しのページは見つかりませんでした。') }}
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="/">ホームに戻る</a>
                </div>
            </div>
        </div>
    </div>
@endsection
