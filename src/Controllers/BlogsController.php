<?php

namespace Lembarek\Blog\Controllers;

use Lembarek\Blog\Repositories\BlogRepository;

class BlogsController extends Controller
{

    protected $blogRepo;

    public function __construct(BlogRepository $blogRepo)
    {
        $this->blogRepo = $blogRepo;
    }

    /**
     * show all blogs
     *
     * @return Response
     */
    public function blogs()
    {
        $blogs = $this->blogRepo->getPopular(10);
        return view('blog::blogs.blogs', compact('blogs'));
    }

    /**
     * show a blogs
     *
     * @param  string  $slug
     * @return Response
     */
    public function show($slug)
    {
        $blog =  $this->blogRepo->getBySlug($slug);
        return view('blog::blogs.show',compact('blog'));
    }

}
