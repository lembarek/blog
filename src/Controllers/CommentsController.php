<?php

namespace Lembarek\Blog\Controllers;

use Lembarek\Blog\Requests\CommentRequest;
use Lembarek\Blog\Repositories\CommentRepositoryInterface;

class CommentsController extends Controller
{
    protected $commentRepo;

    public function __construct(CommentRepositoryInterface $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    /**
     * add a comment to blog
     *
     * @return Reponse
     */
    public function addComment(CommentRequest $request)
    {
        $this->commentRepo->create([
            'user_id' => auth()->user()->id,
            'post_id' => $request->get('post_id'),
            'comment' => $request->get('comment'),
            'parent_id' => $request->get('parent_id')
        ]);

        return back();
    }

}
