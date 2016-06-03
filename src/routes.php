<?php

Route::group(['as' => 'blog::', 'middleware' => ['web']], function () {

    Route::get('/posts', [
        'as' => 'posts',
        'uses' => 'Lembarek\Blog\Controllers\BlogsController@posts',
        ]);

    Route::get('/blog/{slug}', [
        'as' => 'show_blog',
        'uses' => 'Lembarek\Blog\Controllers\BlogsController@show',
        ]);

});
