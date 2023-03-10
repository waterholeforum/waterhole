{{--
|--------------------------------------------------------------------------
| Sidebar
|--------------------------------------------------------------------------
|
| This view will render at the top of the sidebar. In this example, we
| display a call-to-action for guests to log in or register. Feel free
| to change it however you like!
|
--}}

@guest
    <div class="bg-warning-soft rounded p-md text-center row wrap gap-sm">
        <div class="grow stack gap-xs text-xs" style="flex-basis: 25ch">
            <h3 class="h4">Join the conversation.</h3>
            <p>
                Edit this block in
                <code>resources/views/waterhole/<wbr>sidebar.blade.php</code>.
            </p>
        </div>

        <div class="grow row gap-lg justify-center weight-medium">
            <a href="{{ route('waterhole.login') }}">Log In</a>
            @if (Route::has('waterhole.register'))
                <a href="{{ route('waterhole.register') }}">Sign Up</a>
            @endif
        </div>
    </div>
@endguest
