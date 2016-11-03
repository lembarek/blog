<?php

namespace Lembarek\Blog\Repositories;

use Lembarek\Blog\Repositories\PopularityRepositoryInterface;
use Lembarek\Blog\Repositories\PostRepositoryInterface;

class PopularityRepository extends Repository implements PopularityRepositoryInterface
{


    protected $post;

    public function __construct(PostRepositoryInterface $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    /**
     * add popularity to post
     *
     * @param  integer  $post_id
     * @param  integer  $factor_id
     * @return integer
     */
    public function add($post_id, $factor_id)
    {
        $post = $this->postRepo->find($post_id);
        $post->popularity += $this->factors()[$factor_id]*time();
        $post->save();
        return $post->popularity;
    }


    /**
     * it return the factors for popularity
     *
     * @param  string  $
     * @return Array
     */
    public function factors()
    {
        return [
            1 => 1, //one view
            2 => 2, //facebook share
            3 => 2, //twitter share
        ];
    }

}
