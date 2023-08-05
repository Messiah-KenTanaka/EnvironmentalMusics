@extends('app')

@section('title', config('app.name') . ' | 全国釣り場MAP')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="ranking-title">
          全国釣り場MAP
        </div>
        {{--  未ログインユーザー  --}}
        @guest
          <div class="card">
            <div class="d-flex justify-content-center align-items-center" style="height: 70vh;">
              <div class="text-center">
                <h3>全国釣り場情報を閲覧するにはログインが必要です。</h3>
                <p>※アカウントをお持ちでない方は新規登録からお願いします。</p>
                <a class="btn btn-primary" href="{{ route('login') }}">ログイン</a>
                <a class="btn btn-dark" href="{{ route('register') }}">新規登録</a>
              </div>
            </div>
          </div>
        @endguest
        {{--  ログインユーザー  --}}
        @auth
          @include('map.card')
        @endauth
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
