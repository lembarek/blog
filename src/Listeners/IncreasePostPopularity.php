<?php

namespace Lembarek\Blog\Listeners;

use Lembarek\Blog\Events\PostHasViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncreasePostPopularity
{
    /**
    * Create the event listener.
    *
    * @return void
    */
    public function __construct()
    {
    }

    /**
    * Handle the event.
    *
    * @param  TestEvent  $event
    * @return void
    */
    public function handle()
    {

    }

    /**
     * increase popularity when post has viewed
     *
     * @param  PostHasViewed $event
     * @return integer
     */
    public function byView(PostHasViewed $event)
    {
        $event->post->popularity += time();
        $event->post->save();
        return $event->post->popularity;
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events){
        $events->listen(
            PostHasViewed::class,
            'Lembarek\Blog\Listeners\IncreasePostPopularity@byView'
        );
    }
}
