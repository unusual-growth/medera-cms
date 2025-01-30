@extends('site.layouts.master')
@section('content')
    {{-- SEC 1 --}}
    <section class="flex6">
        <div class="container xlarge">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="heading">A Powerful Shield for Your Butyrates: <span class="bold">DRcaps®</span></h2>
                    <p>Acid-sensitive active ingredients require advanced formulation technology to protect them from harsh
                        physiological conditions. According to the World Health Organization, the effectiveness of
                        acid-based products—beneficial live microorganisms for health—relies on proper dosage and
                        preservation. Without adequate protection during production, storage, and transit through the
                        gastrointestinal system, probiotics may lose their efficacy or trigger an immune response. DRcaps®
                        capsules, designed to withstand acidic environments, safeguard probiotics in such conditions while
                        maintaining optimal shelf life. They also ensure the consistent freshness and effectiveness of
                        intestinal butyrates.</p>
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
    @php
        $packagingTypes = [
            [
                'title' => 'Perfect Protection ',
            ],
            [
                'title' => ' Natural',
            ],
            [
                'title' => 'Safe',
            ],
            [
                'title' => 'High  Bio-availability',
            ],
        ];
    @endphp
    <section class="pills-banner">
        <div class="container xlarge">
            <div class="row">
                @foreach ($packagingTypes as $type)
                    <div>
                        <p> {{ $type['title'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- SEC 3 --}}
    <section class="flex6">
        <div class="container xlarge">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="heading"><span>DRcaps®</span>: The Best for Intestinal Butyrates</h2>
                    <p>Renowned for its resistance to stomach acid, DRcaps® protects sensitive components and ensures their
                        safe delivery to the intestines. Explore the exceptional features of DRcaps® with Medera
                        Nutrition—the world’s first and only producer to encapsulate a 568-milligram dose of all-natural
                        ButyEra, specifically designed to support human health.</p>
                </div>

                <div class="col-md-6 bg-coating">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/intestinal.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/intestinal.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/intestinal.png') }}" alt="Açıklama metni">
                    </picture>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 4 --}}
    @php
    $packagingTypes = [
        [
            'icon' => '/dummy-img/peach-fab-icon.svg',
            'title' => 'Resistant to Stomach Acid',
            'description' =>
                'Its unique formula ensures resistance against stomach acid. ',
        ],
        [
            'icon' => '/dummy-img/peach-fab-icon.svg',
            'title' => 'High Bioavailability',
            'description' =>
                'Enhances the absorption of supplements by the body more effectively. ',
        ],
        [
            'icon' => '/dummy-img/peach-fab-icon.svg',
            'title' => 'All-Natural Source',
            'description' =>
                'Not only all-natural but also suitable for vegan and vegetarian use. ',
        ],
    ];
@endphp
<section class="list-card">
    <div class="container xlarge">
        <div class="row">
            <div class="fab-card three">
                @foreach ($packagingTypes as $type)
                    <div>
                        <img src="{{ $type['icon'] }}" alt="{{ $type['title'] }}" />
                        <h3 class="color-peach">{{ $type['title'] }}</h3>
                        <p>{{ $type['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
