@extends('app')

@section('title', config('app.name') . ' | 全国ランキング | サイズ')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col col-xl-9">
        {{--  全国のランキング  --}}
        <div class="ranking-title">
          全国のランキング
        </div>
        <a href="/ranking/size" class="ranking-list-link">
          全国ランキング一覧
          <i class="fa-solid fa-angle-right"></i>
        </a>
        <ranking-slider :ranking="{{ $ranking }}"></ranking-slider>
        {{--  都道府県のランキング  --}}
        <div class="ranking-title">
          滋賀県のランキング
        </div>
        @include('ranking.pref_search')
        <ranking-pref-slider :pref-ranking="{{ $prefRanking }}"></ranking-pref-slider>
        {{--  フィールドのランキング  --}}
        <div class="ranking-title">
          琵琶湖のランキング
        </div>
        @include('ranking.field_search')
        <ranking-field-slider :field-ranking="{{ $fieldRanking }}"></ranking-field-slider>
        @include('floatingButton')
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
