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
use App\Category;
Route::get('/', function () {
    return view('welcome');
});
//Adminページログイン
Route::get('admin/login','userController@getLoginAdmin');
Route::post('admin/login','userController@postLoginAdmin');
//Adminページログアウト
Route::get('admin/logout','userController@getLogoutAdmin');


Route::group(['prefix'=>'admin', 'middleware'=> 'adminLogin'],function(){
	//カテゴリーのグループを定義
	Route::group(['prefix'=>'category'],function(){
		//カテゴリーリストを呼び出す
		Route::get('list','categoryController@getList');
		//カテゴリー編集画面を呼び出す
		Route::get('edit/{id}','categoryController@getEdit');
		//カテゴリー編集した後ポストを呼び出す
		Route::post('edit/{id}','categoryController@postEdit');
		//カテゴリー追加画面を呼び出す
		Route::get('add','categoryController@getAdd');
		//カテゴリー追加した後ポストを呼び出す
		Route::post('add','categoryController@postAdd');
		//カテゴリー削除を呼び出す
		Route::get('delete/{id}','categoryController@getDelete');
	});
	//ニュースのグループを定義
	Route::group(['prefix'=>'news'],function(){
		//ニュースリストを呼び出す
		Route::get('list','newsController@getList');
		//ニュースの編集画面を呼び出す
		Route::get('edit/{id}','newsController@getEdit');
		//ニュースの編集した後ポストを呼び出す
		Route::post('edit/{id}','newsController@postEdit');
		//ニュース追加
		Route::get('add','newsController@getAdd');
		//ニュースの追加した後ポストを呼び出す
		Route::post('add','newsController@postAdd');
		//ニュースの削除を呼び出す
		Route::get('delete/{id}','newsController@getDelete');
	});
	//ニュースの種類のグループを定義
	Route::group(['prefix'=>'newstype'],function(){
		//ニュースの種類リストを呼び出す
		Route::get('list','newstypeController@getList');
		//ニュースの種類の編集画面を呼び出す
		Route::get('edit/{id}','newstypeController@getEdit');
		//ニュースの種類の編集した後ポストを呼び出す
		Route::post('edit/{id}','newstypeController@postEdit');
		//ニュースの種類の追加画面を呼び出す
		Route::get('add','newstypeController@getAdd');
		//ニュースの種類の追加した後ポストを呼び出す
		Route::post('add','newstypeController@postAdd');
		//ニュースの種類の削除を呼び出す
		Route::get('delete/{id}','newstypeController@getDelete');
	});
	//コメントの種類のグループを定義
	Route::group(['prefix'=>'comment'],function(){
		//ニュースの種類の削除を呼び出す
		Route::get('delete/{id}/{idNews}','commentController@getDelete');
	});
	//スライドのグループを定義
	Route::group(['prefix'=>'slide'],function(){
		//スライドリストを呼び出す
		Route::get('list','slideController@getList');
		//スライドの編集画面を呼び出す
		Route::get('edit/{id}','slideController@getEdit');
		//スライドの編集した後ポストを呼び出す
		Route::post('edit/{id}','slideController@postEdit');
		//スライドの追加画面を呼び出す
		Route::get('add','slideController@getAdd');
		//スライドの追加した後ポストを呼び出す
		Route::post('add','slideController@postAdd');
		//スライドの削除を呼び出す
		Route::get('delete/{id}','slideController@getDelete');
	});
	//ユーザーのグループを定義
	Route::group(['prefix'=>'user'],function(){
		//ユーザーリストを呼び出す
		Route::get('list','userController@getList');
		//ユーザーの編集画面を呼び出す
		Route::get('edit/{id}','userController@getEdit');
		//ユーザーの編集した後ポストを呼び出す
		Route::post('edit/{id}','userController@postEdit');
		//ユーザーの追加画面を呼び出す
		Route::get('add','userController@getAdd');
		//ユーザーの追加した後ポストを呼び出す
		Route::post('add','userController@postAdd');
		//ユーザーの削除を呼び出す
		Route::get('delete/{id}','userController@getDelete');
	});
	//Ajax グループ
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('newstype/{idCategory}','ajaxController@getNewsType');
	});
});

//ニュースホームページ
Route::get('home','pagesController@home');
//問い合わせ
Route::get('contact','pagesController@contact');
//ニュースの種類
Route::get('newstype/{id}', 'pagesController@newstype');
//詳細ニュース
Route::get('news/{id}','pagesController@news');
//コメント追加
Route::post('comment/{id}','commentController@postComment');
//検索
Route::post('search','pagesController@search');