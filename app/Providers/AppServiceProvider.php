<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Waterhole\Extend;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*
        |-----------------------------------------------------------------------
        | Waterhole Extenders
        |-----------------------------------------------------------------------
        |
        | Put any custom CSS in this file, and it will be loaded on every page,
        | following Waterhole's default CSS. For more information about
        |
        */
        Extend\Stylesheet::add(resource_path('css/waterhole/app.css'));

        Extend\DocumentHead::add('waterhole.head');
        Extend\LayoutBefore::add('waterhole.hero');
        Extend\IndexSidebar::add('waterhole.sidebar', -1);
    }
}
