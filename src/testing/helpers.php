<?php

use Lembarek\Blog\Models\Post;
use Lembarek\Blog\Models\Tag;
use Lembarek\Blog\Models\Category;

function createPost($overs = [], $limit=1)
{
    return factory(Post::class, $limit)->create($overs);
}

function makePost($overs = [], $limit=1)
{
    return factory(Post::class, $limit)->make($overs);
}

function createTag($overs = [], $limit=1)
{
    return factory(Tag::class, $limit)->create($overs);
}

function makeTag($overs = [], $limit=1)
{
    return factory(Tag::class, $limit)->make($overs);
}

function createCategory($overs = [], $limit=1)
{
    return factory(Category::class, $limit)->create($overs);
}

function makeCategory($overs = [], $limit=1)
{
    return factory(Category::class, $limit)->make($overs);
}


