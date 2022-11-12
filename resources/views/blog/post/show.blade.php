<x-app-layout>

    @include('layouts.breadcrumbs')

    <main class="pt-6 pb-16 lg:pt-12 lg:pb-24 bg-white dark:bg-gray-900">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post->title }}
                    </h1>
                </header>
                <div>
                    <img class="float-right h-48 rounded" src="{{ $post->image }}">
                    <p class="lead">{!! $post->excerpt !!}</p>
                    <p>
                        {!! $post->body !!}
                    </p>
                </div>
                <div class="text-sm">
                    @if ($post->tags()->count() > 0)
                        <div>
                            Tagged: {!! $post->formattedTags !!}
                        </div>
                    @endif
                    <div>
                        Updated: {{ $post->updated_at->diffForHumans() }}
                    </div>
                    @auth
                    <div class="text-right">
                        <a class="text-xs" href='{{ $post->adminUrl }}'>edit</a>
                    </div>
                    @endauth
                </div>
            </article>
        </div>

    </main>

    @include('section.footer-small')

    @include('code-syntax-highlighting')

    @include('layouts.seo')            
</x-app-layout>
