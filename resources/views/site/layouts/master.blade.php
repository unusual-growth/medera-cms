<!DOCTYPE html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}">
@include('site.meta.head')
<body>
    {{-- {!! TwillAppSettings::get('custom-scripts.gtm.bodyscript') !!} --}}
    @include('site.layouts.header')
    <main>
        @yield('content')
    </main>
     @include('site.layouts.footer')
</body>
    @stack('custom-last-script')
    @stack('final-scripts')
</html>
