<?php

namespace Lembarek\Blog\Controllers;

use Lembarek\Core\Repositories\CategoryRepositoryInterface;

class CategoriesPostsController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * it show categories page
     *
     * @return Response
     */
    public function index()
    {
        $categories = $this->categoryRepo->where(['parent' => 0])->get();
        return view('blog::categories.index', compact('categories'));
    }
}
