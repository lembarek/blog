<?php

namespace Lembarek\Blog\Repositories;

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
        return $this->model->latest()->publishedBeforeNow()->limit($limit)->get();
    }

}
