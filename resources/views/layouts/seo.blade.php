@if(isset($seo))
    @push('seo')
<!-- Per page SEO -->
        <!-- SEO title/description/canonical -->
        {!! SEOMeta::generate() !!}

        <!-- SEO OpenGraph -->
        {!! OpenGraph::generate() !!}
        <!-- SEO Twitter -->
        {!! Twitter::generate() !!}

        <!-- SEO JsonLd -->
        {!! JsonLd::generate() !!}
    @endpush
@else 
    @push('seo')
<!-- All pages SEO -->
        @sectionMissing('title')
<title>{{ config('app.name', 'Laravel') }} - {{ App\Services\Blog::subtitle() }}</title>
        @else
<title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
        @endif
<meta name="description" content="@yield('meta_description', config('seotools.meta.defaults.description'))">
    @endpush
@endisset
