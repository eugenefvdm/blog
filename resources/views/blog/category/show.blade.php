<x-app-layout>

    @section('title', $category->title )

    @section('meta_description', $category->description)
    
    <div class="relative bg-gray-50 px-4 pt-16 pb-20 sm:px-6 lg:px-8 lg:pt-24 lg:pb-28">

        <div class="absolute inset-0">
            <div class="h-1/3 bg-white sm:h-2/3"></div>
        </div>
        
        <div class="relative mx-auto max-w-7xl">

            <div>{{ Breadcrumbs::render('category', $category) }}</div>

            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $category->title }}</h2>
                <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">Lorem ipsum dolor sit amet consectetur,
                    adipisicing elit. Ipsa libero labore natus atque, ducimus sed.</p>
            </div>
            
            <div>

                

            </div>
        </div>
    </div>

</x-app-layout>

