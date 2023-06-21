<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::prefix('login')->name('login.')->group(function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});
Route::prefix('register')->name('register.')->group(function () {
    Route::get('/{provider}', 'Auth\RegisterController@showProviderUserRegistrationForm')->name('{provider}');
    Route::post('/{provider}', 'Auth\RegisterController@registerProviderUser')->name('{provider}');
});

// 投稿
Route::get('/', 'ArticleController@index')->name('articles.index');
Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth');
Route::resource('/articles', 'ArticleController')->only(['show']);
Route::patch('/articles/{article}', 'ArticleController@delete')->name('articles.delete')->middleware('auth');
Route::prefix('articles')->name('articles.')->group(function () {
    Route::put('/{article}/like', 'ArticleController@like')->name('like')->middleware('auth');
    Route::delete('/{article}/like', 'ArticleController@unlike')->name('unlike')->middleware('auth');
});

// ハッシュタグ
Route::get('/tags/{name}', 'TagController@show')->name('tags.show');

// ランキング
Route::get('/ranking', 'RankingController@index')->name('ranking.index');
Route::get('/ranking/{pref}', 'RankingController@show')->name('ranking.show');

// 地図
Route::get('/map', 'MapController@index')->name('map.index');

// 天気予報
Route::get('/weather', 'WeatherController@index')->name('weather.index');
Route::get('/weather/{pref}', 'WeatherController@show')->name('weather.show');

// 投稿検索
Route::get('/search', 'SearchController@index')->name('search.index');
Route::post('/search', 'SearchController@show')->name('search.show');

// お問い合わせ
Route::get('/{name}/contact', 'ContactController@index')->name('contact.index');
Route::post('/contact', 'ContactController@mailToAdmin')->name('contact.mailToAdmin');

// プライバシーポリシー
Route::get('/policy', 'PolicyController@index')->name('policy.index');

// 報告
Route::post('/{userId}/report', 'ReportController@index')->name('report.index');
Route::post('/report', 'ReportController@storeArticleReport')->name('report.storeArticleReport');
Route::get('/reportContent', 'ReportController@show')->name('reportContent.show');

// ユーザー
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', 'UserController@show')->name('show');
    Route::get('/{name}/likes', 'UserController@likes')->name('likes');
    Route::get('/{name}/followings', 'UserController@followings')->name('followings');
    Route::get('/{name}/followers', 'UserController@followers')->name('followers');
    Route::get('/{name}/block', 'UserController@block')->name('block');
    Route::middleware('auth')->group(function () {
        Route::get('/{name}/edit', 'UserController@edit')->name('edit');
        Route::patch('/{name}/update', 'UserController@update')->name('update');
        Route::put('/{name}/follow', 'UserController@follow')->name('follow');
        Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
        Route::post('/{userId}/block', 'UserController@userBlock')->name('userBlock');
        Route::get('/{userId}/confirmDeleteUser', 'UserController@confirmDeleteUser')->name('confirmDeleteUser');
        Route::delete('/{userId}/delete', 'UserController@deleteUser')->name('deleteUser');
    });
});
