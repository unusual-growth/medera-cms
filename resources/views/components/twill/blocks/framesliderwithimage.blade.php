    {{-- SEC 7 --}}
@php
    $sliderSec = [
        [
            'image' => '/dummy-img/fh-slider1.png',
            'title' => 'Build Trust with Your Customers',
            'desc' =>
                'Demonstrate your reliability with our gut butyrates, developed through five years of dedicated R&D and supported by scientific evidence. By sharing detailed technical information, analysis results, and scientific findings, you enable your customers to gain a deeper understanding and confidence in your products.',
        ],
        [
            'image' => '/dummy-img/fh-slider1.png',
            'title' => 'Connect Directly with Your Customers',
            'desc' =>
                "With customized packaging options tailored to your brand's needs, you can integrate gut butyrates into your brand identity, strengthening loyalty among both existing and potential customers.",
        ],
        [
            'image' => '/dummy-img/fh-slider1.png',
            'title' => 'Guarantee Environmental Responsibility',
            'desc' =>
                'By prioritizing sustainability at every stage —from production to logistics— we minimize the environmental footprint of your products. This commitment allows you and your customers to actively contribute to a sustainable future.',
        ],
    ];
    // dd(
    //     $repeater('image-wysiwyg')[0]->renderData->block->imagesAsArrays('image','default'),
    // );
@endphp

<section class="framed-slider-with-image {{$block->input('preset')}}">
    <div class="container xlarge">
        <div class="row">
            <div class="col-sm-6">
                <div id="slider-controller" class='swiper controlling swiper-creative'>
                    <div class="swiper-wrapper">
                        @foreach ($repeater('image-wysiwyg') as $item)
                            @php
                                $image = $item->renderData->block->imagesAsArrays('image','default')[0];
                            @endphp
                            <div class="swiper-slide">
                                <div>
                                    <img src="{{ $image["src"] }}" alt="{{ $image["alt"] }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="slider-content" class='col-sm-6 swiper content swiper-creative swiper-3d'>
                <div class="swiper-wrapper">
                    @foreach ($repeater('image-wysiwyg') as $item)
                        <div class="swiper-slide">
                            <div>
                                {!! $item->renderData->block->translatedInput('content') !!}
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination-container">
                    <div class="swiper-pagination-custom"></div>
                    <div class="swiper-button-next custom-next-button">→</div>
                </div>

            </div>
        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var mainSlider = new Swiper('#slider-content', {
            slidesPerView: 1,
            speed: 800,
            loop: true,
            spaceBetween: 20,
            effect: 'slide',
            navigation: {
                nextEl: '.custom-next-button', // Custom butonu kullan
            },
            on: {
                slideChange: function () {
                    updatePagination(mainSlider);
                }
            }
        });

        var controllerSlider = new Swiper('#slider-controller', {
            slidesPerView: 1,
            speed: 800,
            loop: true,
            spaceBetween: 20,
            effect: 'slide',
        });

        mainSlider.controller.control = controllerSlider;
        controllerSlider.controller.control = mainSlider;

        function updatePagination(swiper) {
            let currentIndex = (swiper.realIndex + 1).toString().padStart(2, '0');
            let totalSlides = (swiper.slides.length).toString().padStart(2, '0'); // Loop düzeltmesi
            document.querySelector('.swiper-pagination-custom').innerText = `${currentIndex}/${totalSlides}`;
        }

        updatePagination(mainSlider);
    });

  </script>
