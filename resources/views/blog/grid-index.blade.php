<x-guest-layout>

    @section('meta_description', 'My Blog is an opinionated blog platform with focus on speed, ease of use, and SEO.')

    <div class="relative px-3 pt-3 pb-3 sm:px-5 sm:pt-5 sm:pb-5 md:px-8 md:pt-8 md:pb-8 lg:px-10 lg:pt-10 lg:pb-10">
        <div class="relative mx-auto max-w-7xl">
            @include('blog.grid-articles')
        </div>
    </div>

    @include('layouts.seo')
</x-guest-layout>
