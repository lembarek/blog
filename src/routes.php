<?php

Route::group(['as' => 'blog::', 'middleware' => ['web']], function () {

    Route::get('/pages', [
        'as' => 'pages',
        'uses' => 'Lembarek\Blog\Controllers\PagesController@pages',
        ]);

    Route::get('/blog/{slug}', [
        'as' => 'show_page',
        'uses' => 'Lembarek\Blog\Controllers\PagesController@show',
        ]);

});
