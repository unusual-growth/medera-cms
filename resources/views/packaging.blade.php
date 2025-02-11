@extends('site.layouts.master')
@section('content')
    {{-- SEC 1 --}}
    <section class="flex6">
        <div class="container xlarge">
            <div class="row justify-space-between">
                <div class="col-md-5">
                    <h2> Discover Our Custom Packaging Options <strong>for Butyrates </strong></h2>
                    <p>Designed to optimize, balance, and strengthen gut microbiota—the key to a healthy life—our butyrate
                        supplements are available in various packaging options to meet diverse needs.
                        <br /><br />
                        With our custom packaging solutions, we prepare butyrates tailored to users' preferences and
                        requirements. Whether in bulk quantities or capsule form, branded or unbranded, we deliver our
                        butyrate
                        supplements to suit your demands. </br>
                </div>

                <div class="col-md-6 bg-coating">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/for-butyrates.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/for-butyrates.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/for-butyrates.png') }}" alt="Açıklama metni">
                    </picture>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 2 --}}
    @php
        $packagingTypes = [
            [
                'icon' => '/dummy-img/peach-fab-icon.svg',
                'title' => 'Production',
                'description' => 'All products from our 24/7 production line are stocked. ',
            ],
            [
                'icon' => '/dummy-img/peach-fab-icon.svg',
                'title' => 'Quality Control',
                'description' => 'Purity and naturalness are verified by Eurofins Food Testing Laboratories.',
            ],
            [
                'icon' => '/dummy-img/peach-fab-icon.svg',
                'title' => 'Packaging',
                'description' => 'Purity and naturalness are verified by Eurofins Food Testing Laboratories.',
            ],
            [
                'icon' => '/dummy-img/peach-fab-icon.svg',
                'title' => 'Delivery',
                'description' => 'Delivered as quickly as possible via air, land, or sea transportation. ',
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

    {{-- SEC 3 --}}
    <section class="flex6">
        <div class="container xlarge">
            <div class="row justify-space-between">
                <div class="col-md-6 bg-coating">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/supporting.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/supporting.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/supporting.png') }}" alt="Açıklama metni">
                    </picture>
                </div>
                <div class="col-md-6">
                    <h2> Supporting Your High-Volume Orders with 20 kg Solutions </h2>
                    <br>As we usher in a new era of gut health, we optimize your business processes to maximize
                    satisfaction. Our specially designed 20 kg bags ensure safer and more efficient storage of your
                    products. At Medera Nutrition, we support our valued partners by reducing operational burdens for
                    large-scale orders while maintaining product quality. </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 4 Banner --}}
    <section class="banner ">
        <div class="container xlarge">
            <div class="row">
                <div class="bags">
                    <h4>Receive your orders in specially designed 20 kg bags for operational convenience.</h4>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 5  --}}
    @php
        $packagingTypes = [
            [
                'icon' => '/dummy-img/peach-fab-icon.svg',
                'title' => 'Operational Convenience',
                'description' =>
                    'Compact bagging options simplify storage and logistics processes, reducing workload.  ',
            ],
            [
                'icon' => '/dummy-img/peach-fab-icon.svg',
                'title' => 'Product Quality',
                'description' =>
                    'Butyrates are packaged in special food-grade bags to ensure freshness and quality until they reach your customers as a product. ',
            ],
            [
                'icon' => '/dummy-img/peach-fab-icon.svg',
                'title' => 'Sustainability',
                'description' =>
                    'Our packaging system minimizes packaging waste, fostering an environmentally friendly approach. ',
            ],
        ];
    @endphp
    <section class="list-card preset-color-peach">
        <div class="container xlarge">
            <div class="row">
                <div class="fab-card three">
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

    {{-- SEC 6  --}}
    <section class="journey-section">
        <div class="container xlarge journey-container">
            <div class="journey-image col-sm-5">
                <picture>
                    <source srcset="{{ asset('/dummy-img/pills-enhance.png') }}" media="(min-width: 1024px)">
                    <source srcset="{{ asset('/dummy-img/pills-enhance.png') }}" media="(min-width: 768px)">
                    <img src="{{ asset('/dummy-img/pills-enhance.png') }}" alt="Açıklama metni">
                </picture>
            </div>
            <div class="journey-content col-sm-7">
                <div>
                    <h3>Enhance Butyrate Performance with DRcaps®!</h3>
                    <p>To maximize the bioavailability of your gut butyrate products, we boost their effectiveness using
                        acid-resistant, plant-based DRcaps® capsules. Our butyrate supplements prepared in DRcaps® capsules
                        offer a ready-to-use solution for consumers.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 7  --}}
    <section class="plant-based">
        <div class="container xlarge">
            <div class="row">
                <div>
                    <h3>Experience plant-based DRcaps® capsules and optimize the impact of butyrate.</h3>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 8  MINI IMAGE --}}
    @php
        $packagingTypes = [
            [
                'icon' => '/dummy-img/mini-img.png',
                'title' => 'Standardized Dosage',
                'description' =>
                    'Each capsule contains the same amount of active ingredients to increase product effectiveness.',
            ],
            [
                'icon' => '/dummy-img/mini-img.png',
                'title' => 'Hygiene',
                'description' => 'It ensures maximum hygiene reliability by securely preserving the product. ',
            ],
            [
                'icon' => '/dummy-img/mini-img.png',
                'title' => 'Consumer Reach',
                'description' => 'The capsule formulation expands the product’s appeal to a broader consumer base.',
            ],
            [
                'icon' => '/dummy-img/mini-img.png',
                'title' => 'High Performance',
                'description' =>
                    'Resistant to stomach acid, the capsules dissolve in the intestines for enhanced performance.',
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
    {{-- SEC 9  --}}
    <section class="banner">
        <div class="container xlarge">
            <div class="row">
                <div class="plant-based">
                    <h3>Click here for more information about DRcaps®.</h3>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 10  --}}
    <section class="flex6">
        <div class="container xlarge">
            <div class="row justify-space-between">
                <div class="col-md-5">
                    <h2> Stand Out with Custom-Designed Bottles for Your Butyrates!</h2>
                    <p>We carefully store the gut butyrates we formulate for our business partners, tailored for your needs,
                        and deliver them to you by filling them into bottles under hygienic conditions. We extend the shelf
                        life of your products while preserving their active components for longer. With easy-to- open and
                        -close caps of the bottles, we enhance portability and make daily use more convenient.  </p>
                </div>

                <div class="col-md-6 bg-coating">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/medicine2.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/medicine2.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/medicine2.png') }}" alt="Açıklama metni">
                    </picture>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 11  --}}
    <section class="banner ">
        <div class="container xlarge">
            <div class="row">
                <div class="purchase">
                    <h3>Purchase your butyrates in bottles and extend their shelf life.</h3>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 12  --}}
    @php
        $packagingTypes = [
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'Freshness',
                'description' =>
                    'Airtight bottles prevent oxidation, preserving the freshness of butyrates. This enhances product efficacy and extends shelf life.',
            ],
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'Dosage Control',
                'description' =>
                    'Ensures precise packaging for optimal effectiveness while allowing easy transport and storage. ',
            ],
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'Marketing Advantage',
                'description' =>
                    'Bottles demonstrate an environmentally conscious approach and allow the product to be offered with versatile packaging options.',
            ],
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'Product Information',
                'description' =>
                    'Provides a sleek, professional appearance for butyrates, simplifies branding, and enhances usability and portability.',
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

    {{-- SEC 13  --}}
    <section class="flex6">
        <div class="container xlarge">
            <div class="row justify-space-between">
                <div class="col-md-6 bg-coating">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/medicine2.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/medicine2.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/medicine2.png') }}" alt="Açıklama metni">
                    </picture>
                </div>
                <div class="col-md-6">
                    <h2> Stand Out with Custom-Designed Bottles for Your Butyrates!</h2>
                    <p>We carefully store the gut butyrates we formulate for our business partners, tailored for your needs,
                        and deliver them to you by filling them into bottles under hygienic conditions. We extend the shelf
                        life of your products while preserving their active components for longer. With easy-to- open and
                        -close caps of the bottles, we enhance portability and make daily use more convenient.  </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 14  --}}
    <section class="banner">
        <div class="container xlarge">
            <div class="row">
                <div class="customize">
                    <h3>Customize your order with a White Label and align your butyrates with your brand.</h3>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 15  --}}
    @php
        $packagingTypes = [
            [
                'icon' => '/dummy-img/mini-img.png',
                'title' => 'Saving',
                'description' => 'Products are delivered shelf-ready, saving time and effort.',
            ],
            [
                'icon' => '/dummy-img/mini-img.png',
                'title' => 'Standard Quality',
                'description' => 'Consolidated production and packaging ensure consistent quality standards. ',
            ],
            [
                'icon' => '/dummy-img/mini-img.png',
                'title' => 'Speed',
                'description' => 'Shelf-ready packaging optimizes storage processes and accelerates deliveries. ',
            ],
            [
                'icon' => '/dummy-img/mini-img.png',
                'title' => 'Cost-effectiveness',
                'description' => 'Managing all processes under one roof offers an economical solution.',
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

    {{-- SEC 16  --}}
    <section class="flex6">
        <div class="container xlarge">
            <div class="row justify-space-between">
                <div class="col-md-6">
                    <h2> Stand Out with Custom-Designed Bottles for Your Butyrates!</h2>
                    <p>We carefully store the gut butyrates we formulate for our business partners, tailored for your needs,
                        and deliver them to you by filling them into bottles under hygienic conditions. We extend the shelf
                        life of your products while preserving their active components for longer. With easy-to- open and
                        -close caps of the bottles, we enhance portability and make daily use more convenient.  </p>
                </div>
                <div class="col-md-6 bg-coating">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/person.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/person.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/person.png') }}" alt="Açıklama metni">
                    </picture>
                </div>

            </div>
        </div>
    </section>

    {{-- SEC 17  --}}
    {{-- <section class="double-crossed-columns-with-content">
        <div class="container xlarge">
            <div class="row">
                <div class="col-md-6">
                    <h4>Partner with Medera Nutrition and rise to leadership in gut health. </h4>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </section> --}}
@endsection
