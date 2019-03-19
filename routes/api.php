<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {

    Route::prefix('books')->group(function () {
        Route::get('get/{id?}', [
            'uses' => 'API\BookController@get',
            'as' => 'api/v1/books/get'
        ]);

        Route::post('post', [
            'uses' => 'API\BookController@post',
            'as' => 'api/v1/books/post'
        ]);

        Route::patch('patch/{id?}', [
            'uses' => 'API\BookController@patch',
            'as' => 'api/v1/books/patch'
        ]);

        Route::delete('delete/{id?}', [
            'uses' => 'API\BookController@delete',
            'as' => 'api/v1/books/delete'
        ]);

        Route::patch('import/{id?}', [
            'uses' => 'API\BookController@import',
            'as' => 'api/v1/books/import'
        ]);

        Route::patch('borrow', [
            'uses' => 'API\BookController@borrow',
            'as' => 'api/v1/books/borrow'
        ]);

    });

    Route::prefix('authors')->group(function () {
        Route::get('get/{id?}', [
            'uses' => 'API\AuthorController@get',
            'as' => 'api/v1/authors/get'
        ]);

        Route::post('post', [
            'uses' => 'API\AuthorController@post',
            'as' => 'api/v1/authors/post'
        ]);

        Route::patch('patch/{id?}', [
            'uses' => 'API\AuthorController@patch',
            'as' => 'api/v1/authors/patch'
        ]);

        Route::delete('delete/{id?}', [
            'uses' => 'API\AuthorController@delete',
            'as' => 'api/v1/authors/delete'
        ]);
    });

    Route::prefix('publishers')->group(function () {
        Route::get('get/{id?}', [
            'uses' => 'API\PublisherController@get',
            'as' => 'api/v1/publishers/get'
        ]);

        Route::post('post', [
            'uses' => 'API\PublisherController@post',
            'as' => 'api/v1/publishers/post'
        ]);

        Route::patch('patch/{id?}', [
            'uses' => 'API\PublisherController@patch',
            'as' => 'api/v1/publishers/patch'
        ]);

        Route::delete('delete/{id?}', [
            'uses' => 'API\PublisherController@delete',
            'as' => 'api/v1/publishers/delete'
        ]);
    });

    Route::prefix('genres')->group(function () {
        Route::get('get/{id?}', [
            'uses' => 'API\GenreController@get',
            'as' => 'api/v1/genres/get'
        ]);

        Route::post('post', [
            'uses' => 'API\GenreController@post',
            'as' => 'api/v1/genres/post'
        ]);

        Route::patch('patch/{id?}', [
            'uses' => 'API\GenreController@patch',
            'as' => 'api/v1/genres/patch'
        ]);

        Route::delete('delete/{id?}', [
            'uses' => 'API\GenreController@delete',
            'as' => 'api/v1/genres/delete'
        ]);
    });

    Route::prefix('histories')->group(function () {
        Route::get('get/{id?}', [
            'uses' => 'API\BookHistoryController@get',
            'as' => 'api/v1/histories/get'
        ]);

        Route::post('post', [
            'uses' => 'API\BookHistoryController@post',
            'as' => 'api/v1/histories/post'
        ]);

        Route::patch('patch/{id?}', [
            'uses' => 'API\BookHistoryController@patch',
            'as' => 'api/v1/histories/patch'
        ]);

        Route::delete('delete/{id?}', [
            'uses' => 'API\BookHistoryController@delete',
            'as' => 'api/v1/histories/delete'
        ]);

        Route::patch('rent', [
            'uses' => 'API\BookHistoryController@rent',
            'as' => 'api/v1/histories/rent'
        ]);

        Route::patch('return', [
            'uses' => 'API\BookHistoryController@returnBook',
            'as' => 'api/v1/histories/return'
        ]);
    });
});
