<?php

Route::group(['as' => 'blog::', 'middleware' => ['web']], function () {

    Route::get('/blog/{slug}', [
        'as' => 'show_page',
        'uses' => 'Lembarek\Blog\Controllers\PagesController@show',
        ]);

});
