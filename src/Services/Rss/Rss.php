<?php

namespace Lembarek\Blog\Services\Rss;

use Illuminate\Cache\Repository;
use Carbon\Carbon;
use Suin\RSSWriter\Feed;
use Suin\RSSWriter\Channel;
use Suin\RSSWriter\Item;
use Lembarek\Core\Services\Rss\Rss as CoreRss;
use Lembarek\Blog\Repositories\PostRepositoryInterface;

class Rss extends CoreRss
{
    protected $cache;

    protected $repo;


    public function __construct(Repository $cache, PostRepositoryInterface $postRepo)
    {
        $this->cache = $cache;
        $this->repo = $postRepo;
    }

    protected function title()
    {
        return config('blog.title');
    }

    protected function description()
    {
        return config('blog.description');
    }

    protected function lang()
    {
        return config('blog.lang');
    }

    protected function  author()
    {
       return config('blog.author');
    }

    public function  url($post)
    {
        return route('blog::show_post', ['slug' => $post->slug]);
    }

    public function getuid($post)
    {
        return route('blog::show_post', ['slug' => $post->slug]);
    }
}
