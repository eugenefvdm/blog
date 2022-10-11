<!-- Seo Start -->
{!! SEOMeta::generate() !!}

<!-- OpenGraph -->
{!! OpenGraph::generate() !!}
<!-- Twitter -->
{!! Twitter::generate() !!}

<!-- JsonLd -->
{!! JsonLd::generate() !!}            

@sectionMissing('title')
<title>{{ config('app.name', 'Laravel') }} - {{ App\Services\Blog::subtitle() }}</title>
@else
<title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
@endif
<!-- Seo End -->