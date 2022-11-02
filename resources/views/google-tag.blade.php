@production
    @guest
        @if (\App\Services\Settings::googleTag())
            <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ \App\Services\Settings::googleTag() }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ \App\Services\Settings::googleTag() }}');
        </script>
        @endif
    @else
        <!-- Not in guest mode -->
    @endguest
@else
    <!-- Not in production -->
@endproduction
