<?php

namespace Lembarek\Blog\Models;

use Lembarek\Blog\Models\Tag;
use Lembarek\Blog\Traits\Tagable;

class Post extends Model
{
  use Tagable;

  protected $dates = ['published_at'];

  public function setTitleAttribute($value)
  {
    $this->attributes['title'] = $value;

    if (! $this->exists) {
      $this->attributes['slug'] = str_slug($value);
    }
  }
}
