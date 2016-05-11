<?php

namespace Lembarek\Blog\Controllers;

use Lembarek\Blog\Repositories\PageRepository;

class PagesController extends Controller
{

    protected $pageRepo;

    public function __construct(PageRepository $pageRepo)
    {
        $this->pageRepo = $pageRepo;
    }

    /**
     * show all pages
     *
     * @return Response
     */
    public function pages()
    {
        $pages = $this->pageRepo->getPopular(10);
        return view('blog::pages.pages', compact('pages'));
    }

    /**
     * show a pages
     *
     * @param  string  $slug
     * @return Response
     */
    public function show($slug)
    {
        $page =  $this->pageRepo->getBySlug($slug);
        return view('blog::pages.show',compact('page'));
    }

}
