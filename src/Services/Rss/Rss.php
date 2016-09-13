<?php

namespace Lembarek\Blog\Services\Rss;

use Illuminate\Cache\Repository;
use Carbon\Carbon;
use Suin\RSSWriter\Feed;
use Suin\RSSWriter\Channel;
use Suin\RSSWriter\Item;
use Lembarek\Blog\Repositories\PostRepositoryInterface;

class Rss
{

    protected $cache;

    protected $postRepo;

    public function __construct(Repository $cache, PostRepositoryInterface $postRepo)
    {

        $this->cache = $cache;
        $this->postRepo = $postRepo;
    }

  /**
   * check if the rss has a item
   *
   * @param  string  $item
   * @return void
   */
  public function has($item)
  {
      return $this->cache->has($item);
  }

  /**
   * get a rss item
   *
   * @param  string  $item
   * @return void
   */
  public function get($item)
  {
      return $this->cache->get($item);
  }

  /**
   * add rss item
   *
   * @param  string  $item
   * @return void
   */
  public function add($item, $rss, $time)
  {
     return $this->cache->add($item, $rss, $time);
  }

  /**
   * Return a string with the feed data
   *
   * @return string
   */
  public function buildRssFeed()
  {
    $now = Carbon::now();
    $feed = new Feed();
    $channel = new Channel();
    $channel
      ->title(config('blog.title'))
      ->description(config('blog.description'))
      ->url(url('/'))
      ->language(config('blog.lang'))
      ->copyright('Copyright (c) '.config('blog.author'))
      ->lastBuildDate($now->timestamp)
      ->appendTo($feed);

    $posts = $this->postRepo->forRss();

    foreach ($posts as $post) {
      $item = new Item();
      $item
        ->title($post->title)
        ->url(route('blog::show_post', ['slug' => $post->slug]))
        ->pubDate($post->published_at->timestamp)
        ->guid(route('blog::show_post', ['slug' => $post->slug]), true)
        ->appendTo($channel);
    }


    // Replace a couple items to make the feed more compliant
    $feed = str_replace(
      '<rss version="2.0">',
      '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">',
      $feed
    );
    $feed = str_replace(
      '<channel>',
      '<channel>'."\n".'    <atom:link href="'.url('/rss').
      '" rel="self" type="application/rss+xml" />',
      $feed
    );

    return $feed;
  }

  /**
   * get Rss feed
   *
   * @return Rss
   */
  public function getRssFeed()
  {

    if ($this->has('rss-feed')) {
      return $this->get('rss-feed');
    }

    $rss = $this->buildRssFeed();

    $this->add('rss-feed', $rss, config('blog.cache_time', 120));

    return $rss;

  }

}
