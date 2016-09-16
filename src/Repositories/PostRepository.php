<?php

namespace Lembarek\Blog\Repositories;

use Carbon\Carbon;
use Lembarek\Blog\Models\Post;

class PostRepository extends Repository implements PostRepositoryInterface
{

    protected $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    /**
     * get popular pages
     *
     * @param  integer  $limit
     * @return Blog
     */
    public function getPopular($limit=20)
    {
        return $this->model->latest()->whereActive(1)->publishedBeforeNow()->limit($limit)->get();
    }

    /**
     * get post for Rss
     *
     * @param integer $limit
     *
     * @return Post
     */
    public function getRssItems($limit=20)
    {
        $now = Carbon::now();

        return $this->model
            ->where('published_at', '<=', $now)
            ->orderBy('published_at', 'desc')
            ->take(config('blog.rss_size', $limit))
            ->get();
    }

}
