<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Waterhole\Extend;

class WaterholeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        /*
        |-----------------------------------------------------------------------
        | Waterhole Extenders
        |-----------------------------------------------------------------------
        |
        | The main mechanism by which you'll hook into Waterhole is with
        | extenders. There are dozens more extenders like this covering all
        | parts of Waterhole's views and functionality, ready to hook into.
        |
        | Learn more: https://waterhole.dev/docs/extending
        |
        */

        Extend\Stylesheet::add(resource_path('css/waterhole/app.css'));

        Extend\DocumentHead::add('waterhole.head');

        Extend\Header::replace('title', 'waterhole.title');
    }
}
