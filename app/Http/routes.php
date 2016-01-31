<?php

/*
|--------------------------------------------------------------------------
| Route Patterns
|--------------------------------------------------------------------------
|
*/

Route::pattern('id', '[0-9]+');


/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/'    , ['as' => 'home.index' ,'uses' => 'postController@index']);
	Route::get('about', ['as' => 'about.index','uses' => 'aboutController@index']);
	Route::get('posts', ['as' => 'posts.index','uses' => 'postController@index']);

	Route::get('posts/create'   , ['as' => 'posts.create'   ,'uses' =>'postController@create']);
	Route::post('posts'         , ['as' => 'posts.store'    ,'uses' =>'postController@store' ]);
	Route::get('posts/{id}'     , ['as' => 'posts.show'     ,'uses' =>'postController@show']);
	Route::get('posts/{id}/edit', ['as' => 'posts.edit'     ,'uses' =>'postController@edit']);
	Route::patch('posts/{id}'   , ['as' => 'posts.update'   ,'uses' =>'postController@update']);
	Route::delete('posts/{id}'  , ['as' => 'posts.destroy'  ,'uses' =>'postController@destroy']);

	Route::post('posts/{id}/comment', ['as' => 'posts.comment', function($id) {
	    return 'posts.comment: '.$id;
	}]);

	Route::get('hot'    , ['as' => 'posts.hot'      , 'uses'=>'postController@Hot']);
	Route::get('random' , ['as' => 'posts.random'   , 'uses'=>'postController@random']);

});
