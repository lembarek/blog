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
    public function posts()
    {
        $posts = $this->blogRepo->getPopular(10);
        return view('blog::blog.posts', compact('posts'));
    }

    /**
     * show a blogs
     *
     * @param  string  $slug
     * @return Response
     */
    public function show($slug)
    {
        $post =  $this->blogRepo->getBySlug($post);
        return view('blog::blog.show',compact('post'));
    }

}
