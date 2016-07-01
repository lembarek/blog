<?php

namespace Lembarek\Blog\Models;

use Lembarek\Blog\Models\Tag;
use Lembarek\Blog\Traits\Tagable;

class Post extends Model
{
  use Tagable;

  protected $fillable = ['title', 'description', 'body', 'published_at'];

  protected $dates = ['published_at'];

  public function setTitleAttribute($value)
  {
    $this->attributes['title'] = $value;

    if (! $this->exists) {
      $this->attributes['slug'] = str_slug($value);
    }
  }

  public  function scopePublishedBeforeNow($query)
  {
      return $query->where('published_at', '<', \Carbon\Carbon::now());
  }

  public function save(array $options = [])
  {
      $this->author = auth()->user()->username;
      parent::save($options);
  }
}
