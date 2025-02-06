<!DOCTYPE html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}">
@include('site.meta.head')
<body>
    {!! TwillAppSettings::get('custom-scripts.gtm.bodyscript') !!}
    <style>
        :root {
            --color-primary: #901540;
        }
    </style>

    {{-- <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKXSWZML"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) --> --}}

    @include('site.layouts.header')

    <main>
        @yield('content')
    </main>
     @include('site.layouts.footer')
    @if(!(isset($noFooter) && $noFooter))
        {{-- <x-footer></x-footer> --}}
    @endif
</body>

    @stack('custom-last-script')
    @stack('final-scripts')
</html>
