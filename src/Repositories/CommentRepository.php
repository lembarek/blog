<?php

namespace Lembarek\Blog\Repositories;

use Lembarek\Blog\Models\Comment;

class CommentRepository extends Repository implements CommentRepositoryInterface
{

    protected $model;

    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

}
