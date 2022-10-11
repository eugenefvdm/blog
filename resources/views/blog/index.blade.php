<x-app-layout>

    @section('title', '')

    @section('meta_description', '')

    <div class="relative bg-gray-50 px-4 pt-16 pb-12 sm:px-6 lg:px-8 lg:pt-24 lg:pb-12">
        <div class="absolute inset-0">
            <div class="h-1/3 bg-white sm:h-2/3"></div>
        </div>
        <div class="relative mx-auto max-w-7xl">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ \App\Services\Blog::title() }}
                </h2>
                <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">{{ \App\Services\Blog::subtitle() }}</p>
            </div>
            <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">

                @foreach ($posts as $post)
                    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                        @if ($post->featured_image)
                            <div class="flex-shrink-0">

                                <a href="/{{ $post->category->slug }}/{{ $post->slug }}">
                                    <img class="h-48 w-full object-cover" src="{{ $post->featured_image }}"
                                        alt="">
                                </a>
                            </div>
                        @endif
                        <div class="flex flex-1 flex-col justify-between bg-white p-6">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-indigo-600">
                                    <a href="/category/{{ $post->category->slug ?? '' }}" class="hover:underline">
                                        {{ $post->category->title ?? '' }}
                                    </a>
                                </p>
                                <div class="mt-2 block">
                                    <p class="truncate text-xl font-semibold text-gray-900">
                                    <a href="/{{ $post->category->slug }}/{{ $post->slug }}" class="hover:underline">
                                    {{ $post->title }}
                                    </a>
                                    </p>
                                    <p class="line-clamp-3 mt-3 text-base text-gray-500">{!! $post->body !!}</p>
                                    <a class="mt-1 text-sm hover:underline"
                                        href="/{{ $post->category->slug }}/{{ $post->slug }}" class="text-sm">Read
                                        more...</a>
                                </div>
                            </div>
                            <div class="mt-6 flex items-center">
                                <div class="flex-shrink-0">
                                    <div>
                                        <span class="sr-only">{{ $post->user->name }}</span>

                                        <img class="h-10 w-10 rounded-full border"
                                            src="{{ $post->user->profile_photo_url }}"
                                            alt="The blog post author is {{ $post->user->name }}" />
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">
                                    <div>{{ $post->user->name }}</div>
                                    </p>
                                    <div class="flex space-x-1 text-sm text-gray-500">
                                        <time
                                            datetime="{{ $post->created_at->format('Y-m-d') }}">{{ $post->created_at->format('Y-m-d') }}</time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    @include('section.footer-small')

</x-app-layout>
