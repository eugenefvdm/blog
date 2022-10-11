@if (\App\Services\Blog::enableBreadcrumbs())
    <div class="ml-1 mt-1">
        {{ Breadcrumbs::render() }}
    </div>
@endif