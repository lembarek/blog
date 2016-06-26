<?php

Route::group(['as' => 'blog::', 'middleware' => ['web'], 'namespace' => 'Lembarek\Blog\Controllers'], function () {

    Route::get('/blog', [
        'as' => 'posts',
        'uses' => 'BlogsController@posts',
        ]);

    Route::get('/blog/{slug}', [
        'as' => 'show_post',
        'uses' => 'BlogsController@show',
        ]);


    Route::get('/blog/tag/{tag_name}', [
        'as' => 'posts_with_tag',
        'uses' => 'BlogsController@PostsWithTag',
        ]);


});
