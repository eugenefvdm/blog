<div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">

    @foreach ($posts as $post)
        <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
            @if ($post->featured_image)
                <div class="flex-shrink-0">

                    <a href="{{ $post->url }}">
                        <img class="h-48 w-full object-cover" src="{{ $post->image }}" alt="">
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
                        <p class="text-xl font-semibold text-gray-900">
                            <a href="{{ $post->url }}" class="hover:underline">
                                {{ $post->title }}
                            </a>
                        </p>
                        <p class="line-clamp-3 mt-3 text-base text-gray-500">{!! $post->content !!}</p>

                        <a class="mt-2 text-sm hover:underline" href="{{ $post->url }}">                            
                            Read more...
                        </a>

                    </div>
                </div>
                <div class="mt-6 flex items-center">
                    <div class="flex-shrink-0">
                        <div>
                            <span class="sr-only">{{ $post->user->name }}</span>

                            <img class="h-10 w-10 rounded-full border" src="{{ $post->user->profile_photo_url }}"
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
                @auth
                    <div class="text-right">
                        <a class="text-xs" href='{{ $post->adminUrl }}'>edit</a>
                    </div>
                @endauth
            </div>
        </div>
    @endforeach

</div>
