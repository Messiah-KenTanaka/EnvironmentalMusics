@extends('app')

@section('title', config('app.name') . ' | 全国ランキング | サイズ')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col col-xl-9">
        {{--  全国のランキング  --}}
        <a href="/ranking/size">
          <div class="ranking-title">
            全国のランキング
          </div>
        </a>
        <a href="/ranking/size" class="ranking-list-link">
          全国ランキング一覧
          <i class="fa-solid fa-angle-right"></i>
        </a>
        <ranking-slider :ranking="{{ $ranking }}"></ranking-slider>
        {{--  都道府県のランキング  --}}
        <a href="/ranking/pref/{{ $randomPref }}">
          <div class="ranking-title">
            {{ $randomPref }}のランキング
          </div>
        </a>
        @include('ranking.pref_search')
        <ranking-pref-slider :pref-ranking="{{ $prefRanking }}"></ranking-pref-slider>
        {{--  フィールドのランキング  --}}
        <a href="/ranking/field/{{ $randomField }}">
          <div class="ranking-title">
            {{ $randomField }}のランキング
          </div>
        </a>
        @include('ranking.field_search')
        <ranking-field-slider :field-ranking="{{ $fieldRanking }}"></ranking-field-slider>
        {{-- @include('floatingButton') --}}
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
