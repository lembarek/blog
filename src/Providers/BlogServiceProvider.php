<?php

namespace Lembarek\Blog\Providers;

use Lembarek\Core\Providers\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{


    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->fullBoot('blog', __DIR__.'/../');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->bind(
             'Lembarek\Blog\Repositories\BlogRepositoryInterface',
             'Lembarek\Blog\Repositories\BlogRepository'
         );

    }
}
