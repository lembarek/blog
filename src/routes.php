<?php

Route::group(['as' => 'blog::', 'middleware' => ['web']], function () {

    Route::get('/blogs', [
        'as' => 'blogs',
        'uses' => 'Lembarek\Blog\Controllers\BlogsController@blogs',
        ]);

    Route::get('/blog/{slug}', [
        'as' => 'show_blog',
        'uses' => 'Lembarek\Blog\Controllers\BlogsController@show',
        ]);

});
