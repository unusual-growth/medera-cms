@php
    $id = uniqid('slider-');
    $fid = uniqid();
@endphp
@push('preload')
    @php
        $slide = $slides->first();
        if($isMobile){
            $slideImage = $slide->image('slider-image-mobile', 'default');
            $media = "(max-width: 767px)";
        } else if ($isTablet){
            $slideImage = $slide->image('slider-image-tablet', 'default');
            $media = "(max-width: 1023px)";
        } else {
            // desktop
            $slideImage = $slide->image('slider-image', 'default');
            $media = "(min-width: 1024px)";
        }
    @endphp
    <link rel="preload" href="{{ $slide->image('slider-image', 'default') }}" as="image" media="{{ $media }}">
@endpush
<section @class(['hero','formed'])>
    <div class="slide-backgrounds">
        @foreach ($slides as $slide)
            <picture @class([
                'active' => $loop->first
            ]) data-id="{{$loop->index}}" >
                <source srcset="{{ $slide->image('slider-image', 'default') }}" media="(min-width: 1024px)">
                <source srcset="{{ $slide->image('slider-image-tablet', 'default') }}" media="(min-width: 768px)">
                <img src="{{ $slide->image('slider-image-mobile', 'default') }}" alt="{{ $slide->imageAltText('slider-image') }}">
            </picture>
        @endforeach
    </div>
    <div class="container xlarge">
        <div class="row">
            <div class="slider-col col-md-7 col-sm-6">
                <div id="{{ $id }}" class='swiper hero-slider'>
                    <div class="swiper-wrapper">
                        @foreach ($slides as $slide)
                            <div class="swiper-slide">
                                    <{{ $slide->heading_type }}
                                        {{ $attributes->class(['heading' => in_array($slide->heading_type, ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'])]) }}>
                                        {!! $slide->title !!}
                                    </{{ $slide->heading_type }}>
                                    <p> {!! $slide->description !!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="hero-pagination swiper-pagination  swiper-pagination-custom"></div>
            </div>


            <div class="form-col md-5 col-sm-6">
                @unusualForm(['formData' => config('forms.'.$app_template.'.hero')])
                {{--  @include('unusual_form::layouts._form',[
                'formData' => config($config->form)
            ]) --}}
            </div>
        </div>
    </div>
    {{-- <div class="autoplay-progress">
        <svg viewBox="0 0 48 48">
            <circle cx="24" cy="24" r="20"></circle>
        </svg>
        <span></span>
    </div> --}}
</section>


@push('custom-last-script')
    <script>
        function initializeSwiper{{ $fid }}(selector) {
            new _swiper(selector, {
                    modules: [
                        _swiperController,
                        _swiperPagination,
                        _swiperNavigation,
                        _swiperAutoplay,
                        _swiperCreativeEffect,
                        _swiperKeyboard,
                        _swiperEffectFade,
                        _swiperFreeMode,
                    ],
                    slidesPerView: 1,
                    spaceBetween: 0,
                    loop: 1,
                    speed: 800,
                    autoplay: {
                        delay: 10000,
                        disableOnInteraction: false,
                    },
                    on: {
                        autoplayTimeLeft: (swiper, time, progress) => {
                            var progressCircle = $(".autoplay-progress svg")[0];
                            var progressContent = $(".autoplay-progress span")[0];
                            progressCircle.style.setProperty("--progress", 1 - progress);
                            progressContent.textContent = `${Math.ceil(time / 1000)}s`;
                        },
                        slideChangeTransitionStart: (swiper) => {
                            $('.slide-backgrounds picture.active').removeClass('active');
                            $('.slide-backgrounds picture[data-id="' + swiper.realIndex + '"]').addClass('active');
                        },
                    },
                    effect: 'creative',
                    creativeEffect: {
                        prev: {
                            translate: [0, 0, -500],
                            opacity: 0,
                        },
                        next: {
                            translate: ['-100%', 0, 0],
                            opacity: 1,
                        },
                    },
                    pagination: {
                        el: selector+'+.hero-pagination.swiper-pagination',
                        bulletClass: "swiper-pagination-bullet",
                        bulletActiveClass: "active-tab",
                        type: "custom",
                        clickable: 1,
                        renderCustom: renderBulletsWithFraction,
                    },
                }

            );
        }
        document.addEventListener('DOMContentLoaded', function() {
            initializeSwiper{{ $fid }}('#{{ $id }}');
        });
    </script>
@endpush
@if($inEditor)
<script>
    function initializeSwiper{{ $fid }}(selector) {
        new _swiper(selector, {
                modules: [
                    _swiperController,
                    _swiperPagination,
                    _swiperNavigation,
                    _swiperAutoplay,
                    _swiperCreativeEffect,
                    _swiperKeyboard,
                    _swiperEffectFade,
                    _swiperFreeMode,
                ],
                slidesPerView: 1,
                spaceBetween: 0,
                loop: 1,
                speed: 800,
                autoplay: {
                    delay: 10000,
                    disableOnInteraction: false,
                },
                on: {
                    autoplayTimeLeft: (swiper, time, progress) => {
                        var progressCircle = $(".autoplay-progress svg")[0];
                        var progressContent = $(".autoplay-progress span")[0];
                        progressCircle.style.setProperty("--progress", 1 - progress);
                        progressContent.textContent = `${Math.ceil(time / 1000)}s`;
                    },
                    slideChangeTransitionStart: (swiper) => {
                            $('.slide-backgrounds picture.active').removeClass('active');
                            $('.slide-backgrounds picture[data-id="' + swiper.realIndex + '"]').addClass('active');
                        },
                },
                effect: 'creative',
                creativeEffect: {
                    prev: {
                        translate: [0, 0, -500],
                        opacity: 0,
                    },
                    next: {
                        translate: ['-100%', 0, 0],
                        opacity: 1,
                    },
                },
                pagination: {
                    el: selector+'+.hero-pagination.swiper-pagination',
                    bulletClass: "swiper-pagination-bullet",
                    bulletActiveClass: "active-tab",
                    type: "custom",
                    clickable: 1,
                    renderCustom: renderBulletsWithFraction,
                },
            }

        );
    }
    document.addEventListener('DOMContentLoaded', function() {
        initializeSwiper{{ $fid }}('#{{ $id }}');
    });
</script>
@endif
