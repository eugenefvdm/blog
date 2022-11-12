<div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">

    @foreach ($tags as $tag)
        <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
            @if ($tag->featured_image)
                <div class="flex-shrink-0">

                    <a href="{{ $tag->url }}">
                        <img class="h-48 w-full object-cover" src="{{ $tag->image }}" alt="">
                    </a>
                </div>
            @endif
            <div class="flex flex-1 flex-col justify-between bg-white p-6">
                <div class="flex-1">
                    <p class="text-sm font-medium text-indigo-600">
                        <a href="/tag/{{ $tag->slug ?? '' }}" class="hover:underline">
                            {{ $tag->title ?? '' }}
                        </a>
                    </p>
                    <div class="mt-2 block">
                        <p class="text-xl font-semibold text-gray-900">
                            <a href="{{ $tag->url }}" class="hover:underline">
                                {{ $tag->title }}
                            </a>
                        </p>
                        <p class="line-clamp-3 mt-3 text-base text-gray-500">{!! $tag->description !!}</p>

                        {{-- <a class="mt-2 text-sm hover:underline" href="{{ $tag->url }}">                            
                            Read more...
                        </a> --}}

                    </div>
                </div>
                {{-- <div class="mt-6 flex items-center">
                    <div class="flex-shrink-0">
                        <div>
                            <span class="sr-only">{{ $tag->user->name }}</span>

                            <img class="h-10 w-10 rounded-full border" src="{{ $tag->user->profile_photo_url }}"
                                alt="The blog post author is {{ $tag->user->name }}" />
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">
                        <div>{{ $tag->user->name }}</div>
                        </p>
                        <div class="flex space-x-1 text-sm text-gray-500">
                            <time
                                datetime="{{ $tag->created_at->format('Y-m-d') }}">{{ $tag->created_at->format('Y-m-d') }}</time>
                        </div>
                    </div>
                </div> --}}
                @auth
                    <div class="text-right">
                        <a class="text-xs" href='{{ $tag->adminUrl }}'>edit</a>
                    </div>
                @endauth
            </div>
        </div>
    @endforeach

</div>