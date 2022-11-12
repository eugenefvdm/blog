<x-app-layout>
    
    @section('title', 'Categories')
    @section('meta_description', "A list of all the blog categories for " . config('app.name'))

    @include('layouts.breadcrumbs')    

    <div class="relative bg-gray-50 px-4 pt-6 pb-12 sm:px-6 lg:px-8 lg:pt-12 lg:pb-12">
        <div class="absolute inset-0">
            <div class="h-1/3 bg-white sm:h-2/3"></div>
        </div>
        <div class="relative mx-auto max-w-7xl">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ \App\Services\Blog::title() }} categories
                </h2>
                <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">A list of all of the categories for {{ config('app.name') }}.</p>
            </div>
            
            @include('blog.category.categories')

        </div>
    </div>

    @include('section.footer-small')

    @include('layouts.seo')
</x-app-layout>
