<?php

Route::group(['as' => 'blog::', 'middleware' => ['web']], function () {

    Route::get('/blog', [
        'as' => 'posts',
        'uses' => 'Lembarek\Blog\Controllers\BlogsController@posts',
        ]);

    Route::get('/blog/{slug}', [
        'as' => 'show_post',
        'uses' => 'Lembarek\Blog\Controllers\BlogsController@show',
        ]);

});
