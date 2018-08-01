<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $subscribe = [
        \App\Listeners\UserEventListener::class,
    ];

    protected $listen = [
        \App\Events\ArticlesEvent::class => [
        \App\Listeners\ArticlesEventListener::class
        ],
        \App\Events\BookingsEvent::class => [
        \App\Listeners\BookingsEventListener::class
        ],
        \Illuminate\Auth\Events\Login::class => [
            \App\Listeners\UserEventListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        /*
        \Event::listen('article.created', function ($article) {
            var_dump('=== Getting Event. Event detail is as below.<br/>');
            var_dump($article->toArray());
        });
        */

        \Event::listen(
            \App\Events\ArticleCreated::class,
            \App\Listeners\ArticlesEventListener::class
        );
    }
}
