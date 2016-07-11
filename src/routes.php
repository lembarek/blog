<?php

Route::group([
    'as' => 'blog::',
    'middleware' => ['web'],
    'namespace' => 'Lembarek\Blog\Controllers',
    'prefix' => 'blog',
], function () {

    Route::get('', [
        'as' => 'posts',
        'uses' => 'BlogsController@posts',
        ]);

    Route::get('/tag/{tag_name}', [
        'as' => 'posts_with_tag',
        'uses' => 'BlogsController@PostsWithTag',
        ]);

    Route::get('/categories', [
        'as' => 'categories',
        'uses' => 'CategoriesPostsController@index',
        ]);

    Route::get('/{slug}', [
        'as' => 'show_post',
        'uses' => 'BlogsController@show',
        ]);

});
