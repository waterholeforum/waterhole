{{--
|--------------------------------------------------------------------------
| Hero
|--------------------------------------------------------------------------
|
| This view will render straight after the header, before the page content
| – a great place to put a welcome "hero". Here's an example template
| to get you started! Feel free to change it how you like.
|
--}}

{{-- Only display the hero on the forum index --}}
@if (Request::routeIs('waterhole.home', 'waterhole.channels.show'))
    <section class="section container">
        <div class="stack gap-lg" style="max-width: 60ch">
            <h1>Community</h1>

            <p class="lead">
                Welcome to your new Waterhole project! You can edit this
                block in <code>resources/views/waterhole/hero.blade.php</code>.
            </p>

            <x-waterhole::search-form class="lead"/>
        </div>
    </section>
@endif
