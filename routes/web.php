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
    Route::get('/google', 'Auth\LoginController@redirectToProviderGoogle')->name('google');
    Route::get('/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle')->name('google.callback');
    Route::get('/apple', 'Auth\LoginController@redirectToProviderApple')->name('apple');
    Route::post('/apple/callback', 'Auth\LoginController@handleProviderCallbackApple')->name('apple.callback');
});
Route::prefix('register')->name('register.')->group(function () {
    Route::get('/google', 'Auth\RegisterController@showProviderUserRegistrationFormGoogle')->name('google');
    Route::post('/google', 'Auth\RegisterController@registerProviderUserGoogle')->name('google');
    Route::get('/apple', 'Auth\RegisterController@showProviderUserRegistrationFormApple')->name('apple');
    Route::post('/apple', 'Auth\RegisterController@registerProviderUserApple')->name('apple');
});

// 投稿
Route::get('/', 'ArticleController@index')->name('articles.index');
Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth');
Route::resource('/articles', 'ArticleController')->only(['show']);
Route::post('/articles/comment/{article}', 'ArticleController@comment')->name('articles.comment')->middleware('auth');
Route::patch('/articles/{article}', 'ArticleController@delete')->name('articles.delete')->middleware('auth');
Route::prefix('articles')->name('articles.')->group(function () {
    Route::put('/{article}/like', 'ArticleController@like')->name('like')->middleware('auth');
    Route::delete('/{article}/like', 'ArticleController@unlike')->name('unlike')->middleware('auth');
});

// コメント
Route::post('/comment', 'ArticleCommentController@comment')->name('comment')->middleware('auth');
Route::patch('/comment/delete/{articleComment}', 'ArticleCommentController@delete')->name('comment.delete')->middleware('auth');

// ハッシュタグ
Route::get('/tags/{name}', 'TagController@show')->name('tags.show');

// ランキング
Route::get('/ranking', 'RankingController@index')->name('ranking.index');
Route::get('/ranking/weight', 'RankingController@nationwideWeight')->name('ranking.nationwideWeight');
Route::get('/ranking/{pref}', 'RankingController@show')->name('ranking.show');
Route::get('/ranking/prefWeight/{pref}', 'RankingController@prefWeight')->name('ranking.prefWeight');
Route::get('/ranking/field/{field}', 'RankingController@field')->name('ranking.field');
Route::get('/ranking/fieldWeight/{field}', 'RankingController@fieldWeight')->name('ranking.fieldWeight');

// 地図
Route::get('/map', 'MapController@index')->name('map.index');

// 天気予報
Route::get('/weather', 'WeatherController@index')->name('weather.index');
Route::get('/weather/{pref}', 'WeatherController@show')->name('weather.show');

// 投稿検索
Route::get('/search', 'SearchController@index')->name('search.index');
Route::get('/searchKeyword', 'SearchController@show')->name('search.show');

// お問い合わせ
Route::get('/contact/{name?}', 'ContactController@index')->name('contact.index');
Route::post('/contactMail', 'ContactController@mailToAdmin')->name('contact.mailToAdmin');
Route::get('/contactContent', 'ContactController@show')->name('contactContent.show');

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
    Route::get('/{name}/conquest', 'UserController@conquest')->name('conquest');
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

// TOP 現状管理者しかアクセス不可
Route::get('/top', 'TopController@index')->name('top.index');