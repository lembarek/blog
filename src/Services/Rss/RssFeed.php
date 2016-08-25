<?php

namespace Lembarek\BLog\Services\Rss;


use Cache;
use Carbon\Carbon;
use Suin\RSSWriter\Channel;
use Suin\RSSWriter\Feed;
use Suin\RSSWriter\Item;
use Lembarek\Blog\Repositories\PostRepositoryInterface;

class RssFeed
{
    protected $postRepo;

    public function __construct(PostRepositoryInterface $postRepo)
    {
        $this->postRepo = $postRepo;
    }

  /**
   * Return the content of the RSS feed
   */
  public function getRSS()
  {
    if (Cache::has('rss-feed')) {
      return Cache::get('rss-feed');
    }

    $rss = $this->buildRssData();
    Cache::add('rss-feed', $rss, config('blog.cache_time', 120));

    return $rss;
  }

  /**
   * Return a string with the feed data
   *
   * @return string
   */
  protected function buildRssData()
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

}
