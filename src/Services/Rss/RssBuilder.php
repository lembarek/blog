<?php

namespace Lembarek\Blog\Services\Rss

class Rss
{

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
