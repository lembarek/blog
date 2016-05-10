<?php

namespace Lembarek\Blog\Repositories;

use Lembarek\Blog\Models\Page;

class PageRepository extends Repository implements PageRepositoryInterface
{

    protected $model;

    public function __construct(Page $model)
    {
        $this->model = $model;
    }

}
