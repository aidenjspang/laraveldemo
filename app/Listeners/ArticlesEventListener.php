<?php

namespace App\Listeners;

//use App\Events\article.created;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArticlesEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function handle(\App\Events\ArticlesEvent $event)
    {
        if ($event->action === 'created') {
            \Log::info(sprintf(
               'Registered new Forum arcitle.: %s',
               $event->article->title
            ));
        }
    }
}
