<?php

namespace Lembarek\Blog\Controllers;

use Lembarek\Blog\Repositories\BlogRepository;
use Lembarek\Blog\Repositories\TagRepositoryInterface;

class BlogsController extends Controller
{

    protected $blogRepo;

    protected $tagRepo;

    public function __construct(BlogRepository $blogRepo, TagRepositoryInterface $tagRepo)
    {
        $this->blogRepo = $blogRepo;
        $this->tagRepo = $tagRepo;
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
        $post =  $this->blogRepo->getBySlug($slug);
        return view('blog::blog.show',compact('post'));
    }

    /**
     * show posts that have a tag
     *
     * @param  integer  $tag
     * @return Response
     */
    public function PostsWithTag($tag_name)
    {
        $posts = $this->tagRepo->findBy('name', $tag_name)->posts()->publishedBeforeNow()->get();

        return view('blog::blog.tags.posts', compact('posts'));
    }

    /**
     * show the page to search for posts
     *
     * @return Response
     */
    public function search()
    {
        return view('blog::blog.search');
    }

}
