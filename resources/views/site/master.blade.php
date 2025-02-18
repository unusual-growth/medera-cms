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
    <div class="floating-form">
        <div class="row no-wrap justify-content-space-between align-items-center activator">
            <h3 class="heading color-white">{{__('util.request-form')}}</h3>
            <svg class="arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 15L12 8L19 15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="formcontainer active">
            <div>
                @unusualForm(['formData' => config('forms.request-form')])
                {{-- @include('unusual_form::layouts._form',[
                    'formData' => config('content.forms.hero-mobile'),
                ]) --}}
            </div>
        </div>
    </div>
</body>

    @stack('custom-last-script')
    @stack('final-scripts')
</html>
