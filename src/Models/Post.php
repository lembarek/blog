<?php

namespace Lembarek\Blog\Models;

use Lembarek\Blog\Models\Comment;

class Post extends Model
{

  protected $dates = ['published_at'];

  public function setTitleAttribute($value)
  {
    $this->attributes['title'] = $value;

    if (! $this->exists) {
      $this->attributes['slug'] = str_slug($value);
    }
  }

  /**
   * a post has many comment
   *
   * @return Comment
   */
  public function Comments()
  {
      return $this->hasMany(Comment::class);
  }
}
