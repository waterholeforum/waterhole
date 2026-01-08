<?php

namespace App\Providers;

use Waterhole\Extend;

class WaterholeServiceProvider extends Extend\ServiceProvider
{
    public function register(): void
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

        $this->extend(function (Extend\Assets\Stylesheet $stylesheet) {
            $stylesheet->add(resource_path('css/waterhole/app.css'));
        });

        $this->extend(function (Extend\Ui\DocumentHead $document) {
            $document->add('waterhole.head');
        });

        $this->extend(function (Extend\Ui\Layout $layout) {
            $layout->header->replace('title', 'waterhole.title');
        });
    }
}
