{{-- //TODO: HTML CSS missing --}}
@php
    $id = uniqid('slider-');
    $fid = uniqid();
    $form_id = uniqid();
    $picture_hierarchy = [
        [
            'key' => 'mobile_image',
            'src' => null,
            'media' => null,
        ],
        [
            'key' => 'tablet_image',
            'src' => null,
            'media' => '(min-width: 768px)',
        ],
        [
            'key' => 'desktop_image',
            'src' => null,
            'media' => '(min-width: 1024px)',
        ],
    ];

    if (!function_exists('setUpPicture')) {
        function setUpPicture($block, $arr, $setMediaNull = false, $i = 0)
        {
            if ($i > array_key_last($arr)) {
                return $arr;
            }
            if ($setMediaNull) {
                $arr[$i]['media'] = null;
            }
            if (!$block->hasImage($arr[$i]['key'])) {
                unset($arr[$i]);
                return setUpPicture($block, $arr, true, $i + 1);
            }
            $arr[$i]['src'] = $block->image($arr[$i]['key']);
            return setUpPicture($block, $arr, false, $i + 1);
        }
    }
@endphp
<section @class(['hero-slider-sect', 'formed'])>
    <div class="slide-backgrounds">
        @foreach ($repeater('slides') as $key => $repeaterItem)
            @php
                $_renderData = $repeaterItem->renderData;
                $slide_block = $_renderData->block;
                $_picture_hierarchy = setUpPicture($slide_block, $picture_hierarchy);
            @endphp
            <picture @class([
                'active' => $loop->first
            ]) data-id="{{$loop->index}}" >
                @for ($i = array_key_last($_picture_hierarchy); $i >= 0; $i--)
                    @php
                        $item = $_picture_hierarchy[$i] ?? null;
                        if (!$item) {
                            break;
                        }
                    @endphp

                    @if ($item['media'])
                        <source srcset="{{ $item['src'] }}" media="{{ $item['media'] }}">
                    @else
                        <img src="{{ $item['src'] }}" alt="{{ $slide_block->imagesAsArrays($item['key'])[0]['alt'] }}">
                    @endif
                @endfor
            </picture>
        @endforeach
    </div>



    <div class="container xlarge">
        <div class="row">
            <div class="slider-col col-md-7 col-sm-6">
                <div id="{{ $id }}" class='swiper hero-slider'>
                    <div class="swiper-wrapper">
                        @foreach ($repeater('slides') as $key => $repeaterItem)
                            @php
                                $_renderData = $repeaterItem->renderData;
                                $slide_block = $_renderData->block;
                                $top_title = $slide_block->translatedInput('top_title');
                                $heading = $slide_block->translatedInput('heading');
                                $text = $slide_block->translatedInput('text');
                                $link = $slide_block->translatedInput('link');
                                $link_text = $slide_block->translatedInput('link_text');
                            @endphp
                            <div class="swiper-slide">
                                <span class="top-title">
                                    {!! $top_title !!}
                                </span>
                                {!! $heading !!}
                                {!! $text !!}
                                <a href="{{ $link }}">{{ $link_text }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="form-col md-5 col-sm-6">
                @php
                    $conf = config('forms.request-form');
                    $conf["id"] = $form_id
                @endphp
                @unusualForm(['formData' => $conf])
                {{--  @include('unusual_form::layouts._form',[
                'formData' => config($config->form)
            ]) --}}
            </div>
        </div>
    </div>
    <div class="hero-pagination swiper-pagination  swiper-pagination-custom"></div>
    <div class="autoplay-progress">
        <svg viewBox="0 0 48 48">
            <circle cx="24" cy="24" r="20"></circle>
        </svg>
        <span></span>
    </div>
</section>


@push('custom-last-script')
    <script>
        // window.forms["{{ $form_id }}"]
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
                        el: ' .hero-pagination.swiper-pagination',
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
