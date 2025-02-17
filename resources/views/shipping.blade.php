@extends('site.layouts.master')
@section('content')
    {{-- SEC 1 VİDEO section --}}

    <section class="video-section">
        <div class="container xlarge">
            <div class="row gap-30">
                <div class="col-md-6 preset-color-peach">
                    <h3>Headline or mini text for the video is here two or three lines would be nice. Like a slogan or
                        quote...</h3>
                </div>
                <div class="col-md-6">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/CeBhwgw_Duw?si=zbFM81keZSLNZuTa"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="banner">
        <div class="container xlarge">
            <div class="row">
                <div class="__info">
                    <div>
                        <span>MEDERA</span>
                        <h4>Your ultimate butyrate partner</h4>
                        <a class="primary-cta" href="#">GET QUOTE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-image-section">
        <div class="container xlarge">
            <div class="row justify-space-between">
                <div class="col-sm-5">
                    <div>
                        <h2>Butyrate for a happier, healthier you. <strong>Buy now!</strong> </h2>
                        <p>Butyrate (butyric acid | CH3CH2CH2-COOH) is a short-chain fatty acid produced by gut bacteria.
                            The four-carbon carboxylic acid offers numerous health benefits, including improved gut health,
                            enhanced metabolic function, boosted cognitive function, reduced inflammation, enhanced immune
                            function, and potential anti-cancer effects.</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/bottle-sec.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/bottle-sec.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/bottle-sec.png') }}" alt="Açıklama metni">
                    </picture>
                    <img class="bottle-img" src="/dummy-img/sise.png" alt="" />
                </div>

            </div>
        </div>
    </section>

    <section class="gut-health-section">
        <div class="container xlarge">
            <div class="row justify-space-between">
                <div class="col-md-5 text-content">
                    <h2>
                        <strong>4-in-1 Formula:<br /></strong>
                        Supporting Gut Health with Unique Components
                    </h2>

                    <p>
                        Our ButyEra are specially designed for gut health and are
                        available in four distinct formulations, each featuring a
                        unique component. By combining calcium, potassium,
                        sodium, and magnesium, we deliver an innovative approach
                        to improving gut health and adding value to human well-being.
                    </p>
                </div>

                <div class=" col-md-6 product-content">
                    <img src="/dummy-img/sise.png" alt="Butyrate Supplement Bottle" class="product-image">
                    <div class="capsule-info preset-color-primary">
                        <p>
                            Each capsule includes 568 mg of components and 174 mg of other fatty acids.
                        </p>
                    </div>

                    <div class="info-box preset-color-primary">
                        <p>
                            Our products contain no artificial coloring, flavoring, animal-derived ingredients, or
                            genetically modified nutrients.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
