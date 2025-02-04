@extends('site.layouts.master')
@section('content')
{{-- SEC 1 --}}
<section class="flex6">
    <div class="container xlarge">
        <div class="row justify-space-between">
            <div class="col-md-5">
                <h2> Working for a Sustainable Future </h2>
                <p>As Medera Nutrition, producing all-natural butyrate since 2024, we are dedicated to building a sustainable future. We embrace sustainability and eco-friendly practices not just as a goal but as an integral part of our corporate culture. We consider environmental, social, and economic impacts in all our activities to leave a better world for future generations.</p>
            </div>

            <div class="col-md-6 bg-coating">
                <picture>
                    <source srcset="{{ asset('/dummy-img/an-all-natural.png') }}" media="(min-width: 1024px)">
                    <source srcset="{{ asset('/dummy-img/an-all-natural.png') }}" media="(min-width: 768px)">
                    <img src="{{ asset('/dummy-img/an-all-natural.png') }}" alt="Açıklama metni">
                </picture>
            </div>
        </div>
    </div>
</section>

{{-- SEC 2 --}}
<section class="flex6">
    <div class="container xlarge">
        <div class="row justify-space-between">
            <div class="col-md-6 bg-coating">
                <picture>
                    <source srcset="{{ asset('/dummy-img/an-all-natural.png') }}" media="(min-width: 1024px)">
                    <source srcset="{{ asset('/dummy-img/an-all-natural.png') }}" media="(min-width: 768px)">
                    <img src="{{ asset('/dummy-img/an-all-natural.png') }}" alt="Açıklama metni">
                </picture>
            </div>
            <div class="col-md-5">
                <h2> Working for a Sustainable Future </h2>
                <p>As Medera Nutrition, producing all-natural butyrate since 2024, we are dedicated to building a sustainable future. We embrace sustainability and eco-friendly practices not just as a goal but as an integral part of our corporate culture. We consider environmental, social, and economic impacts in all our activities to leave a better world for future generations.</p>
            </div>
        </div>
    </div>
</section>

{{-- SEC 3 --}}
BURAYA SLİDER GELECEK.

{{-- SEC 4 --}}
<section class="flex6">
    <div class="container xlarge">
        <div class="row justify-space-between">
            <div class="col-md-5">
                <h2> Creating a Culture Enriched by Diversity </h2>
                <p>We integrate our vision of sustainable business models and long-term success with approaches centered on social responsibility and social consciousness. We embrace the essential components of corporate sustainability - equality, diversity, and inclusion - as our core strategy and ensure that every member of the Medera Nutrition Family has equal opportunities.</p>
            </div>

            <div class="col-md-6 bg-coating">
                <picture>
                    <source srcset="{{ asset('/dummy-img/an-all-natural.png') }}" media="(min-width: 1024px)">
                    <source srcset="{{ asset('/dummy-img/an-all-natural.png') }}" media="(min-width: 768px)">
                    <img src="{{ asset('/dummy-img/an-all-natural.png') }}" alt="Açıklama metni">
                </picture>
            </div>
        </div>
    </div>
</section>

    {{-- SEC 5 --}}
    @php
        $packagingTypes = [
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'Equality',
                'description' =>
'We ensure that everyone on our team has the same rights and opportunities. ',
            ],
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'Diversity',
                'description' =>
                    'We value and equally consider the diverse voices and ideas within our organization.',
            ],
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'Inclusion',
                'description' =>
                    'We foster a workplace where all employees feel a sense of belonging and are empowered to realize their full potential.',
            ],
        ];
    @endphp
    <section class="list-card ">
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
@endsection
