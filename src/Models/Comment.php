<?php

namespace Lembarek\Blog\Models;

use Lembarek\Auth\Models\User;
use Lembarek\Blog\Models\Post;

class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'parent_id', 'comment'];

    /**
     * comment belong to user
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * a comment is attached to post
     *
     * @return Post
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
