@extends('site.layouts.master')
@section('content')

    {{-- SEC 1 --}}
    {{-- <x-allbeings.flex6 /> --}}
    <section class="flex6">
        <div class="container xlarge">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="heading">With Medera, The Secret to Healthy Living Lies in the Gut </h2>
                    <p>The gut is more than just a part of the digestive system—it plays a crucial role in the overall
                        health of both humans and animals. As home to a substantial portion of the body's immune cells and
                        microbiome, the gut serves as a vital communication hub between the body and the brain. A strong gut
                        system, supported by butyrates, enhances resilience against external factors and contributes to
                        overall well-being.<br /><br />As your trusted partner in intestinal health, Medera Nutrition
                        provides calcium, potassium, magnesium, and sodium butyrates, crafted with exclusive formulations to
                        help establish your reputation as a leader in gut health.</p>
                </div>

                <div class="col-md-6 bg-coating">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/forallbeings-flex6.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/forallbeings-flex6.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/forallbeings-flex6.png') }}" alt="Açıklama metni">
                    </picture>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 2 --}}
    {{-- <x-allbeings.customFlex6 /> --}}
    <section class="journey-section">
        <div class="container xlarge journey-container">
            <div class="journey-image col-sm-5">
                <picture>
                    <source srcset="{{ asset('/dummy-img/for-all-beign-customflex6.png') }}" media="(min-width: 1024px)">
                    <source srcset="{{ asset('/dummy-img/for-all-beign-customflex6.png') }}" media="(min-width: 768px)">
                    <img src="{{ asset('/dummy-img/for-all-beign-customflex6.png') }}" alt="Açıklama metni">
                </picture>
            </div>
            <div class="journey-content height-500 dusky-blush-gradient col-sm-7">
                <div>
                    <h3 class="heading">Touch Lives with Medera Nutrition</h3>
                    <p>At Medera Nutrition, we have elevated butyrate—the cornerstone of gut health—by enriching it with
                        essential minerals like calcium, magnesium, sodium and potassium. Backed by scientific research, our
                        innovative nutritional formulations are designed to benefit all living
                        beings.<br /><br />Incorporate the extraordinary power of butyrate into your product range and
                        deliver lasting value to your customers' lives.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 3 --}}
    {{-- <x-allbeings.onlyimage /> --}}
    <picture class="onlyimage">
        <source srcset="{{ asset('/dummy-img/onlyimage.png') }}" media="(min-width: 1024px)">
        <source srcset="{{ asset('/dummy-img/onlyimage.png') }}" media="(min-width: 768px)">
        <img src="{{ asset('/dummy-img/onlyimage.png') }}" alt="Açıklama metni">
    </picture>

    {{-- SEC 4 --}}
    {{-- <x-allbeings.opposite-customflex6 /> --}}
    <section class="journey-section">
        <div class="container xlarge journey-container">
            <div class="journey-content height-380 soft-cloud-gradient col-sm-6">
                <div>
                    <h3 class="heading">Touch Lives with Medera Nutrition</h3>
                    <p>The key to a healthy life starts with a strong gut. At Medera Nutrition, we are pioneering a new era
                        in gut health with our all-natural, vegan intestinal butyrates, completely free from chemicals.
                        Designed for both humans and animals, our butyrates empower our partners to provide innovative and
                        effective solutions for gut health.  </p>
                </div>
            </div>
            <div class="journey-image col-sm-6">
                <picture>
                    <source srcset="{{ asset('/dummy-img/zigzag1.png') }}" media="(min-width: 1024px)">
                    <source srcset="{{ asset('/dummy-img/zigzag1.png') }}" media="(min-width: 768px)">
                    <img src="{{ asset('/dummy-img/zigzag1.png') }}" alt="Açıklama metni">
                </picture>
            </div>
        </div>
    </section>

    {{-- SEC 5 --}}
    <section class="">
        <div class="container xlarge">
            <div class="row gap-30">
                <div class="col-md-6">
                    <picture class="onlyimage">
                        <source srcset="{{ asset('/dummy-img/zigzag2.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/zigzag2.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/zigzag2.png') }}" alt="Açıklama metni">
                    </picture>
                </div>
                <div class="col-md-5">
                    <h2 class="heading">Touch Lives with Medera Nutrition</h2>
                    <p>The key to a healthy life starts with a strong gut. At Medera Nutrition, we are pioneering a new era
                        in gut health with our all-natural, vegan intestinal butyrates, completely free from chemicals.
                        Designed for both humans and animals, our butyrates empower our partners to provide innovative and
                        effective solutions for gut health.  </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 6 --}}
    {{-- <x-allbeings.butyera-flex6 /> --}}
    <section class="flex6">
        <div class="container xlarge">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="heading butyera">Explore our nature-inspired gut supplements.</h2>
                    <p>Our supplements, specifically designed for gut health, comprise 95% butyric acid and a 5% mineral
                        blend. This unique formula supports the natural balance of gut microbiomes, boosting overall
                        well-being. </p>
                </div>
                <div class="col-md-8">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/butyera.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/butyera.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/butyera.png') }}" alt="Açıklama metni">
                    </picture>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 7 --}}
        


@endsection
