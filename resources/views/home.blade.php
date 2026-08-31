<x-waterhole::forum-layout show-sidebar :rss="route('waterhole.rss.posts')">
    <x-waterhole::index>
        <h1 class="visually-hidden">{{ config('waterhole.forum.name') }}</h1>

        <div class="stack gap-lg">
            {{-- Welcome Hero --}}
            <section class="stack align-center gap-lg text-center py-md">
                <div class="stack align-center gap-xs">
                    <h2 class="h1">
                        Welcome to {{ config('waterhole.forum.name') }}
                    </h2>

                    <p class="lead measure color-muted">
                        Find answers, share what you know, and connect with the
                        community.
                    </p>
                </div>

                @if (config('waterhole.system.search_engine'))
                    <x-waterhole::search-form
                        class="full-width text-md"
                        style="max-width: 50ch"
                    />
                @endif
            </section>

            {{-- Featured Structures --}}
            @php
                $featuredNodes = Waterhole\Models\Structure::query()
                    ->isRoot()
                    ->listed()
                    ->whereIn('content_type', [
                        (new Waterhole\Models\Channel())->getMorphClass(),
                        (new Waterhole\Models\Page())->getMorphClass(),
                        (new Waterhole\Models\StructureLink())->getMorphClass(),
                    ])
                    ->with('content')
                    ->inSiblingOrder()
                    ->limit(3)
                    ->get();
            @endphp

            @if ($featuredNodes->isNotEmpty())
                <div class="switcher gap-md" style="--switcher-threshold: 75ch">
                    @foreach ($featuredNodes as $node)
                        <x-waterhole::structure-card
                            :content="$node->content"
                        />
                    @endforeach
                </div>
            @endif

            {{-- Home Feed --}}
            <x-waterhole::home-feed />
        </div>
    </x-waterhole::index>
</x-waterhole::forum-layout>
