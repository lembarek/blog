<?php

namespace Lembarek\Blog\Repositories;

use Lembarek\Blog\Models\Page;

class BlogRepository extends Repository implements BlogRepositoryInterface
{

    protected $model;

    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    /**
     * get popular pages
     *
     * @param  integer  $limit
     * @return Page
     */
    public function getPopular($limit=20)
    {
        return $this->model->latest()->limit($limit)->get();
    }

}
