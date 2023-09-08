@extends('app')

@section('title', config('app.name') . ' | プロフィール編集')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        @if( Auth::id() == $user->id )
          <div class="mt-3 mb-5">
            <div class="card-body pt-0">
              @include('error_card_list')
              <div class="card-text mt-3">
                <form method="POST" action="{{ route('users.update', ['name' => $user->name]) }}" enctype="multipart/form-data">
                  @method('PATCH')
                  @include('users.form')
                  <button type="submit" id="submit-btn" class="btn bg-primary text-white btn-block">
                    <span id="submit-text">プロフィール更新</span>
                    <div class="spinner-border spinner-border-sm ml-2 d-none" role="status">
                      <span class="sr-only">読み込み中...</span>
                    </div>
                  </button>
                </form>
              </div>
            </div>
          </div>
        @endif
        {{-- @include('floatingButton') --}}
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
