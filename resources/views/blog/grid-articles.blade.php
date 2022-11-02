<div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-0.5 sm:gap-1.5 md:gap-2.5">
    @foreach ($posts as $post)
        <div class="flex flex-col overflow-hidden rounded shadow-lg">
            @if ($post->featured_image)
                <div class="flex-shrink-0 my-auto">
                    <a href="{{ $post->url }}">
                        <img class="h-100 w-full " src="{{ $post->image }}" alt="">
                    </a>
                </div>
            @endif
        </div>
    @endforeach
</div>
