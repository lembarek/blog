<?php

namespace Lembarek\Blog\Services\Rss;


class RssFeed
{

    protected $rss;

    public function __construct(Rss $rss)
    {
        $this->rss = $rss;
    }

  /**
   * Return the content of the RSS feed
   */
  public function getRSS()
  {
    return $this->rss->getRssFeed();
  }

}
