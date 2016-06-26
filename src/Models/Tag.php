<?php

namespace Lembarek\Blog\Models;

use Lembarek\Blog\Models\Post;

class Tag extends Model
{

    /**
     * get posts
     *
     * @return Post
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

}
