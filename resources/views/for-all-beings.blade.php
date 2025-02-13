@extends('site.layouts.master')
@section('content')
    {{-- SEC 1 --}}
    {{-- <x-allbeings.flex6 /> --}}
    <section class="flex6">
        <div class="container xlarge">
            <div class="row">
                <div class="col-sm-6">
                    <h2><strong>With Medera</strong>, The Secret to Healthy Living Lies in the Gut </h2>
                    <p>The gut is more than just a part of the digestive system—it plays a crucial role in the overall
                        health of both humans and animals. As home to a substantial portion of the body's immune cells and
                        microbiome, the gut serves as a vital communication hub between the body and the brain. A strong gut
                        system, supported by butyrates, enhances resilience against external factors and contributes to
                        overall well-being.<br /><br />As your trusted partner in intestinal health, Medera Nutrition
                        provides calcium, potassium, magnesium, and sodium butyrates, crafted with exclusive formulations to
                        help establish your reputation as a leader in gut health.</p>
                </div>

                <div class="col-sm-6 bg-coating">
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
    {{-- TO DO MOBİLE --}}
    <section class="journey-section">
        <div class="container xlarge journey-container">
            <div class="journey-image col-sm-5">
                <picture>
                    <source srcset="{{ asset('/dummy-img/for-all-beign-customflex6.png') }}" media="(min-width: 1024px)">
                    <source srcset="{{ asset('/dummy-img/for-all-beign-customflex6.png') }}" media="(min-width: 768px)">
                    <img class="transform-left-center" src="{{ asset('/dummy-img/for-all-beign-customflex6.png') }}"
                        alt="Açıklama metni">
                </picture>
            </div>
            <div class="journey-content height-500 dusky-blush-gradient col-sm-7">
                <div>
                    <h3>Touch Lives with Medera Nutrition</h3>
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
            <div class="journey-content z-index-1 height-380 soft-cloud-gradient col-sm-6">
                <div>
                    <h3>Touch Lives with Medera Nutrition</h3>
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
                    <img class="transform-right-center" src="{{ asset('/dummy-img/zigzag1.png') }}" alt="Açıklama metni">
                </picture>
            </div>
        </div>
    </section>

    {{-- SEC 5 --}}
    <section class="flex6">
        <div class="container xlarge">
            <div class="row gap-30">
                <div class="col-md-6">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/zigzag2.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/zigzag2.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/zigzag2.png') }}" alt="Açıklama metni">
                    </picture>
                </div>
                <div class="col-md-5">
                    <h2>No Supply Shortage with a high volume Production Capacity</h2>
                    <p>As a pioneer in gut health innovation, Medera Nutrition is your trusted partner in advancing
                        digestive health. We carefully craft our vegan products into unique formulations designed to balance
                        the gut microbiome and strengthen the digestive system. Take a step toward excellence in gut health
                        with our clinically proven and scientifically validated ingredients.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 6 --}}
    {{-- <x-allbeings.butyera-flex6 /> --}}
    <section class="section-content-with-single-image">
        <div class="container xlarge">
            <div class="row flex-column gap-30">
                    <div class="content flex-center col-md-12">
                        <div class="col-md-6">
                            <h2>Explore our nature-inspired gut supplements.</h2>
                            <p>Our supplements, specifically designed for gut health, comprise 95% butyric acid and a 5%
                                mineral
                                blend. This unique formula supports the natural balance of gut microbiomes, boosting overall
                                well-being. </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-8 image">
                            <picture>
                                <source srcset="{{ asset('/dummy-img/test.png') }}" media="(min-width: 1024px)">
                                <source srcset="{{ asset('/dummy-img/test.png') }}" media="(min-width: 768px)">
                                <img src="{{ asset('/dummy-img/test.png') }}" alt="Açıklama metni">
                            </picture>
                        </div>
                    </div>
            </div>
        </div>
    </section>

    {{-- SEC 7 SLIDER --}}

    BURAYA SLİDER GELECEK

    {{-- SEC 8 --}}
    <section class="flex6 ">
        <div class="container xlarge">
            <div class="row justify-space-between">
                <div class="col-md-5">
                    <h2>Experience the Power of Nature and R&D in Every Package</h2>
                    <p>At Medera Nutrition, we provide supplements designed to support and balance the gut microbiome of
                        both humans and animals, available in a range of packaging options tailored to our partners' needs.
                        With sleek, modern designs for packages, bags, bottles, and capsules that embody your brand's
                        prestige, we are redefining quality and setting a new industry standard.   </p>
                </div>
                <div class="col-md-6">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/powerofnature.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/powerofnature.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/powerofnature.png') }}" alt="Açıklama metni">
                    </picture>
                </div>
            </div>
        </div>
    </section>



    {{-- SEC 9 --}}
    @php
        $packagingTypes = [
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'Custom Bags',
                'description' =>
                    'We package your bulk and large-scale orders in 20-kilogram food-grade liners. While reducing your costs, we adopt an environmentally-friendly approach.',
            ],
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'DRcaps®',
                'description' =>
                    'We package gut supplements ready for sale using DRcaps®, ensuring the product\'s effectiveness. We protect the products to the utmost level.',
            ],
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'Responsible Bottles',
                'description' =>
                    'Our specially formulated butyrates for gut health are bottled and delivered under the highest quality standards.',
            ],
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'White Label ',
                'description' =>
                    'We maximize the effect of your products at the shelves with custom-designed White Label packaging that enables you to tell your story.',
            ],
        ];
    @endphp
    <section class="list-card">
        <div class="container xlarge">
            <div class="row">
                <div class="fab-card">
                    @foreach ($packagingTypes as $type)
                        <div>
                            <img src="{{ $type['icon'] }}" alt="{{ $type['title'] }}" />
                            <h3>{{ $type['title'] }}</h3>
                            <p>{{ $type['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 10 --}}
    BURAYA FORM GELECEK


    {{-- SEC 11 --}}
    <section class="flex6">
        <div class="container xlarge">
            <div class="row justify-space-between">
                <div class="col-md-5">
                    <h2>Protecting Both You and the Environment</h2>
                    <p>Partnering with Medera Nutrition in intestinal butyrates allows you to promote the digestive health
                        of both humans and animals while honoring your commitment to the environment. As a partner dedicated
                        to both gut health and environmental stewardship, we are working together to create a healthier
                        world for today and future generations.   </p>
                </div>
                <div class="col-md-6">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/powerofnature.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/powerofnature.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/powerofnature.png') }}" alt="Açıklama metni">
                    </picture>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 12 Border list card --}}
    @php
        $packagingTypes = [
            [
                'icon' => '/dummy-img/green-fab-icon.svg',
                'title' => 'We manage resources responsibly',
                'description' => 'We utilize natural resources with responsibility.',
            ],
            [
                'icon' => '/dummy-img/green-fab-icon.svg',
                'title' => 'We embrace the green economy',
                'description' =>
                    'Building an ecosystem based on the shared use of products and services, we prioritize the principles of a greener economy.',
            ],
            [
                'icon' => '/dummy-img/green-fab-icon.svg',
                'title' => 'We protect the environment',
                'description' =>
                    'We minimize our environmental impact through energy efficiency projects and waste management practices.',
            ],
        ];
    @endphp
    <section class="border-list-card">
        <div class="container xlarge">
            <div class="row">
                <div class="__fab-card">
                    @foreach ($packagingTypes as $type)
                        <div>
                            <div>
                                <img src="{{ $type['icon'] }}" alt="{{ $type['title'] }}" />
                                <h3>{{ $type['title'] }}</h3>
                                <p>{{ $type['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 13 --}}
    <section class="flex6">
        <div class="container xlarge">
            <div class="row justify-space-between">
                <div class="col-md-5">
                    <h2>Bring Life to the Gut with Medera Nutrition</h2>
                    <p>Would you like to empower your customers' digestive systems and offer them the key to a healthier
                        life? At Medera Nutrition, our intestinal ButyEra, formulated from untouched natural raw materials
                        through 5 years of R&D, help you enhance your customers' quality of life.  </p>
                </div>
                <div class="col-md-6">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/bringlife.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/bringlife.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/bringlife.png') }}" alt="Açıklama metni">
                    </picture>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 14 --}}
    @php
        $packagingTypes = [
            [
                'icon' => '/dummy-img/peach-fab-icon.svg',
                'title' => 'Gut Health',
                'description' =>
                    'Nourishes colon cells and supports the renewal and protection of intestinal wall cells. Provides anti-inflammatory effects. Can reduce inflammation by boosting the activity of immune cells.',
            ],
            [
                'icon' => '/dummy-img/peach-fab-icon.svg',
                'title' => 'Brain Health ',
                'description' =>
                    'Strengthens the blood-brain barrier, reduces neuroinflammation, and improves brain functions. Supports neurotransmitter production and combats oxidative stress.',
            ],
            [
                'icon' => '/dummy-img/peach-fab-icon.svg',
                'title' => 'Nerve Health',
                'description' =>
                    'Butyrates protect nerve cells (neuroprotection) and support their regeneration. May reduce neuropathy and peripheral nerve damage while balancing the autonomic nervous system.',
            ],
            [
                'icon' => '/dummy-img/peach-fab-icon.svg',
                'title' => 'Mental Health',
                'description' =>
                    'Can stabilize mood by influencing dopamine levels and can help prevent mental disorders such as depression and anxiety.',
            ],
        ];
    @endphp
    <section class="list-card preset-color-peach">
        <div class="container xlarge">
            <div class="row">
                <div class="fab-card">
                    @foreach ($packagingTypes as $type)
                        <div>
                            <img src="{{ $type['icon'] }}" alt="{{ $type['title'] }}" />
                            <h3> {{ $type['title'] }}</h3>
                            <p>{{ $type['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 15 Banner --}}
    <section class="banner">
        <div class="container xlarge">
            <div class="row justify-content-center">
                <div class="improveyourguthealth">
                    <h3>Ready to improve your gut health? <span>BUTYERA is the key!</span></h3>
                </div>
            </div>
        </div>
    </section>


    {{-- SEC 16 --}}
    <section class="flex6">
        <div class="container xlarge">
            <div class="row justify-space-between">
                <div class="col-md-5">
                    <h2>All Your Gut Health Questions are Addressed at Medera!</h2>
                    <p>With our ButyEra for humans and animals, developed by a team of skilled and dedicated professionals,
                        we are leading a new era in gut health. In a world where healthy, vibrant living is a lasting
                        priority, Medera Nutrition helps you stand out in the growing gut health market as your trusted
                        partner.
                        <br /><br />
                        By offering effective solutions that align with your customers’ focus on gut health, we provide you
                        with a competitive edge.
                        <br /><br />
                        Partner with Medera Nutrition today to increase customer satisfaction in gut health and set new
                        standards for excellence in the industry.

                    </p>
                </div>
                <div class="col-md-6">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/allyourgut.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/allyourgut.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/allyourgut.png') }}" alt="Açıklama metni">
                    </picture>
                </div>
            </div>
        </div>
    </section>
@endsection
