<?php

namespace Lembarek\Blog\Models;

use Lembarek\Blog\Models\Tag;
use Lembarek\Blog\Traits\Tagable;
use Lembarek\Core\Models\Category;

class Post extends Model
{
  use Tagable;

  protected $fillable = ['title', 'description', 'body', 'published_at', 'active', 'author'];

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
      $this->attributes['author'] = auth()->user()->username;
      parent::save($options);
  }

  /**
   * it get the catetory of this post
   *
   * @return Category
   */
  public function catogory()
  {
      return $this->belongsTo(Category::class);
  }
}
