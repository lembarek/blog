<?php

namespace Lembarek\Blog\Models;


class Popularity extends Model
{
    protected $table = 'popularity';

    protected $fillable = ['post_id', 'day', 'popularity'];

    /**
     * it belong  to the post
     *
     * @return Post
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
