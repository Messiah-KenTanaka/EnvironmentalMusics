@extends('app')

@section('title', config('app.name') . ' | ユーザー登録')

@section('content')
  <div class="container">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6 mt-5">
        <h1 class="text-center"><a class="text-dark main-font-family" href="/">BCommunity</a></h1>
        <h5 class="text-center"><a class="text-dark main-font-family" href="/">~BASSER~</a></h5>
        <div class="card mt-3">
          <div class="card-body text-center">
            <h2 class="h3 card-title text-center mt-2">ユーザー登録</h2>

            <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="btn btn-block btn-danger">
              <i class="fab fa-google mr-1"></i>Googleで登録
            </a>

            @include('error_card_list')

            <div class="card-text">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="md-form">
                  <label for="name">ユーザー名</label>
                  <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') }}">
                  <small>3〜16文字(<span class="text-danger">ユーザー名は登録後の変更はできません</span>)</small><br>
                  <small>※漢字、ひらがな、カタカナ、及び英字（大文字・小文字）のみ可</small>
                </div>
                <div class="md-form">
                  <label for="email">メールアドレス</label>
                  <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}" >
                  <small class="text-danger">メールアドレスは登録後の変更はできません</small>
                </div>
                <div class="md-form">
                  <label for="password">パスワード</label>
                  <input class="form-control" type="password" id="password" name="password" required>
                </div>
                <div class="md-form">
                  <label for="password_confirmation">パスワード(確認)</label>
                  <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="agreement" name="agreement" required>
                  <label class="form-check-label" for="agreement">
                    利用規約に同意する
                  </label>
                </div>
                <div class="text-center">
                  <a href="#" data-toggle="modal" data-target="#termsModal">利用規約を表示</a>
                </div>
                <button class="btn btn-block dusty-grass-gradient mt-2 mb-2" type="submit" disabled>ユーザー登録</button>
              </form>

              <div class="mt-0">
                <a href="{{ route('login') }}" class="card-text">ログインはこちら</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 利用規約モーダル -->
  <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="termsModalLabel">利用規約</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-pre-wrap">
          @include('agreement')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn dusty-grass-gradient" data-dismiss="modal">閉じる</button>
        </div>
      </div>
    </div>
  </div>
@endsection
