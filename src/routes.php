<?php

Route::group(['as' => 'blog::', 'middleware' => ['web']], function () {

    Route::get('/posts', [
        'as' => 'posts',
        'uses' => 'Lembarek\Blog\Controllers\BlogsController@posts',
        ]);

    Route::get('/post/{slug}', [
        'as' => 'show_post',
        'uses' => 'Lembarek\Blog\Controllers\BlogsController@show',
        ]);

});
