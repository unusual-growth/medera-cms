
{{-- @dd(TwillAppSettings::get('custom-scripts.gtm.headscript')) --}}
<head>
    {{-- {!! TwillAppSettings::get('custom-scripts.gtm.headscript') !!} --}}
    {{-- <script src="https://consent.cookiefirst.com/sites/unusualcompanies.com-b0086c01-4c99-4ecb-b8d9-2ca037d2113e/consent.js"></script>
        <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NKXSWZML');</script> --}}
    <!-- End Google Tag Manager -->
    {{-- <link rel="icon" type="image/x-icon" href="{{ $logos->image('favicon') }}"> --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    {{-- @isset($item)
        {!!  SEOMeta::generate() !!}
        {!!  OpenGraph::generate() !!}
        {!!  Twitter::generate() !!}
    @endisset --}}

    @isset($meta)
        <title>{{ $meta->title }}</title>
        <meta name="description" content="{{ $meta->description }}">
        @isset($meta->index)
            <meta name="robots" content="{{ $meta->index }}">
        @endisset
        @if(isset($canonical))
            <link rel="canonical" href="{{$canonical}}" />
        @elseif(isset($localCanonical))
            {{-- @dd('here') --}}
            <link rel="canonical" href="{{$canonicalUrl}}" />
        @endif
    @endisset
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet"> --}}
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    @stack('scripts')
    @vite([
        "resources/js/app.js",
        "resources/scss/style.scss"
    ])
    @isset($item->schema)
        <script type="application/ld+json">
            {!! $item->schema !!}
        </script>
    @endisset
    @isset($jsonLd)
        {!!$jsonLd!!}
    @endisset
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
    <script src="/vendor/unusual_form/js/step-form.js"></script>
    <script src="/vendor/unusual_form/js/form-validation.js"></script>
    @stack('preload')
    {{-- <link rel="preload" href="{{ $logos->image('logo') }}" as="image"> --}}
    @stack('custom-css')
{{--     @include('vendor.layouts._scripts')
 --}}    {{-- will include GTM here --}}
</head>
