<?php

use Illuminate\Database\Seeder;
use Lembarek\Blog\Models\Post;
use Faker\Factory as Faker;

class PostCategoryTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $faker = Faker::create();
        $posts = Post::all();
        $categories = Category::all();

        foreach($catogories as $category){
            $subPosts= $faker->randomElements($Posts, $faker->numberBetween(0, 8));
            foreach($subPosts as $post){
                $category->attachPost($post);
            }
        }

    }
}
