{{-- @extends('site.layouts.master')
@section('content')
    @php
        $title = [
            [
                'text' => 'Butyrate',
            ],
            [
                'text' => 'Who We Are',
            ],
            [
                'text' => 'How We Work',
            ],
            [
                'text' => 'Library',
            ],
            [
                'text' => 'GET QUOTE',
            ],
        ];
    @endphp
    <header>
        <div class="container xlarge">
            <div class="row">
                <div class="spacing">
                    <div class="logo">
                        <img src="/dummy-img/medera-primary-color.png" alt="">
                    </div>
                    <div class="links">
                        <ul>
                            @foreach ($title as $texts)
                                <li><a href="#"> {{ $texts['text'] }} </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection --}}

@php
$currentLocale = LaravelLocalization::getCurrentLocale();
$defaultLocale = LaravelLocalization::getdefaultLocale();
@endphp
<header>
     <div class="topbar">
        <div class="container xlarge row width-100">
            <div class="row width-100">
                <div class="col-sm-6 d-flex">
                    @foreach ( $social_links_block as $key => $repeaterItem)
                        <div class="social d-flex classic-border">
                        <a target="_blank" href="{{ $repeaterItem->input('url') }}">
                            @php
                                $image = TwillImage::make($repeaterItem, 'social-media-icon')->width(12)->height(12)->toArray();

                            @endphp
                            <div>
                            {!! TwillImage::render($image, [
                                'class' => 'social-icon',
                                'imageStyles'=>['width' => '12px','background-color'=>'transparent']
                            ]) !!}
                            </div>
                        </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                    <div class="lang-switcher">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <div>
                                @if($localeCode === $defaultLocale)
                                    @php
                                        $url = LaravelLocalization::getNonLocalizedURL(LaravelLocalization::getLocalizedURL($localeCode));
                                        $url = empty($url) ? '/' : $url;
                                    @endphp
                                    <a rel="alternate" 
                                       hreflang="{{ $localeCode }}"
                                       href="{{ $url }}"
                                       @class(['active' => LaravelLocalization::getCurrentLocale() == $localeCode])
                                    >
                                        {{ strtoupper($localeCode) }}
                                    </a>
                                @else
                                    <a rel="alternate" 
                                       hreflang="{{ $localeCode }}"
                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                       @class(['active' => LaravelLocalization::getCurrentLocale() == $localeCode])
                                    >
                                        {{ strtoupper($localeCode) }}
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="menu width-100">
        <div class="container xlarge">
            <div class="row no-wrap">
                @php
                    if($currentLocale === $defaultLocale){
                        $homeUrl =  '';
                    }else{
                        $homeUrl = $localeCode;
                    }

                @endphp
            
                <a href="{{ '/'.$homeUrl }}" class="logo">
                    <img src="{{ $logos->image('logo') }}" alt="{{ $logos->imageAltText('logo') }}">
                </a>
                {{-- <div class="col-md-3">
            </div> --}}
                <div class="links col-sm-9 justify-content-end d-flex width-100">
                  <x-menu location="header" type="desktop"/>
                </div>
                <div class="activate-mobile">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 18H20M4 6H20H4ZM4 12H12H4Z" stroke="#001540" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>

            </div>
        </div>
    </div>
    <div class="mobile-menu-close"></div>
    <div class="mobile-menu">
      <x-menu location="header" type="mobile"/>
        <div class="lang-switcher">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <div>
                                @if($localeCode === $defaultLocale)
                                    @php
                                        $url = LaravelLocalization::getNonLocalizedURL(LaravelLocalization::getLocalizedURL($localeCode));
                                        $url = empty($url) ? '/' : $url;
                                    @endphp
                                    <a rel="alternate" 
                                       hreflang="{{ $localeCode }}"
                                       href="{{ $url }}"
                                       @class(['active' => LaravelLocalization::getCurrentLocale() == $localeCode])
                                    >
                                        {{ strtoupper($localeCode) }}
                                    </a>
                                @else
                                    <a rel="alternate" 
                                       hreflang="{{ $localeCode }}"
                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                       @class(['active' => LaravelLocalization::getCurrentLocale() == $localeCode])
                                    >
                                        {{ strtoupper($localeCode) }}
                                    </a>
                                @endif
                    
                </div>
            @endforeach
        </div>
    </div>
</header>
