{{-- @dd(TwillAppSettings::get('custom-scripts.gtm.headscript')) --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
    <script src="/vendor/unusual_form/js/step-form.js"></script>
    <script src="/vendor/unusual_form/js/form-validation.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    @vite([
        "resources/js/app.js",
        "resources/scss/style.scss"
    ])
    @stack('preload')
    {{-- <link rel="preload" href="{{ $logos->image('logo') }}" as="image"> --}}
    @stack('custom-css')
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet"> --}}
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    @stack('scripts')
    @isset($item->schema)
        <script type="application/ld+json">
            {!! $item->schema !!}
        </script>
    @endisset
    @isset($jsonLd)
        {!!$jsonLd!!}
    @endisset

    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
     {!! TwillAppSettings::get('custom-scripts.gtm.headscript') !!}

    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
    @isset($item)
    {!!  SEOMeta::generate() !!}
    {!!  OpenGraph::generate() !!}
    {!!  Twitter::generate() !!}
    @endisset

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
</head>
