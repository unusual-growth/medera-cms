@php
    $id = uniqid('slider-');
    $fid = uniqid();
@endphp
<section class="accordion-slider-section" data-swiper-id="{{ $fid }}">
    <div class="container xlarge">
        <div class="row gap-30">
            <div class="col-md-7">
                <div id="{{ $id }}" class="swiper accordion-image-slider height-100 border-radius-oval">

                    <div class="swiper-wrapper">
                        @foreach ($repeater('items') as $key => $item)
                            @php
                                $_block = $item->renderData->block;
                                $_img = $_block->imagesAsArrays('image')[0];
                            @endphp
                            <div class="swiper-slide">
                                <picture>
                                    <img src="{{ $_img['src'] }}" alt="{{$_img['alt']}}" />
                                </picture>
                            </div>
                        @endforeach
                    </div>
                </div>
                    {{-- <picture>
                    <source srcset="{{ asset('/dummy-img/accordion1.png') }}" media="(min-width: 1024px)">
                    <source srcset="{{ asset('/dummy-img/accordion1.png') }}" media="(min-width: 768px)">
                    </picture> --}}

                    {{-- <img width="{{$img["width"]}}" height="{{$img["height"]}}" src="{{ $img["src"] }}" alt="{{$img["alt"]}}" /> --}}
            </div>
            <div class="col-md-5 ">
                @foreach ($repeater('items') as $key => $item)
                    @php
                        $_block = $item->renderData->block;
                        $_img = $_block->imagesAsArrays('icon')[0];
                    @endphp
                    {{-- !!TODO active logic does not work properly at the beginning --}}
                    <div class="accordion-item {{ $loop->first ? 'active' : '' }}" data-index="{{ $key }}">
                        <div class="title" data-accordion="{{ $key }}">
                                <div style="width: 34px; height: 34px; --mask-image: url('{{ $_img['src'] }}')">
                                </div>
                                <h4 itemprop="name">{{ $_block->translatedInput('title') }}</h4>
                        </div>
                        <div class="content-container">
                            <div class="content" itemprop="text">
                                {!! $_block->translatedInput('content') !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


@push('custom-last-script')
    <script>
        function initializeSwiper{{ $fid }}(selector) {
            return new _swiper(selector, {
                    modules: [
                    ],
                    slidesPerView: 1,
                    spaceBetween: 0,
                    loop: false,
                    rewind: false,
                    speed: 600,
                    allowTouchMove: false,
                }

            );
        }
        document.addEventListener('DOMContentLoaded', function() {
            window.swipers["{{ $fid }}"] = initializeSwiper{{ $fid }}('#{{ $id }}');
        });
    </script>
@endpush
