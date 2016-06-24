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

    Route::post('/comment', [
        'as' => 'add-comment',
        'uses' => 'CommentsController@addComment',
        ]);

});
