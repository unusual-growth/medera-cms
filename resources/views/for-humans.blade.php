@extends('site.layouts.master')

@section('content')
    {{--  HERO METNİ HİZALA--}}
    <section class="hero butyrate">
        <div class="container full-1440">
            <div class="row gap-30 justify-space-between">
                <div class="col-md-6 flex-center">
                    <div class="content">
                        <h1><strong>ButyEra for Humans</strong> by Medera Nutrition</h1>
                        <p>We are expanding our reach with high-quality butyrates for human gut health, developed through
                            over five years of dedicated R&D. Our ButyEra, composed of 95% pure butyrate and 5% binding
                            components, have demonstrated scientifically proven efficacy through rigorous research and
                            testing. They support gut health and empower individuals to enhance their quality of life.</p>
                    </div>
                </div>
                <div class="col-md-6 image">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/for-humans-hero.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/for-humans-hero.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/for-humans-hero.png') }}" alt="Açıklama metni">
                    </picture>
                </div>
            </div>
        </div>
    </section>

{{-- SEC 1 --}}
    <section class="gut-health-section">
        <div class="container xlarge">
            <div class="row content-wrapper">
                <div class="col-md-6 text-content">
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

                    <div class="info-box preset-color-primary">
                        <p>
                            Our products contain no artificial coloring, flavoring, animal-derived ingredients, or
                            genetically modified nutrients.
                        </p>
                    </div>
                </div>

                <div class=" col-md-6 product-content">
                    <img src="/dummy-img/sise.png" alt="Butyrate Supplement Bottle" class="product-image">
                    <div class="capsule-info">
                        <p>
                            Each capsule includes 568 mg of components and 174 mg of other fatty acids.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- SEC 2 FAQ --}}
    @php
        $faqSection = [
            [
                'icon' => '/dummy-img/calcium.svg',
                'question' => 'Calcium Butyrate',
                'answer' =>
                    'At Medera Nutrition, we are proud to introduce a unique formula that blends our all-natural, vegan, and additive-free butyrates with predominantly calcium and a smaller amount of magnesium. This innovative combination creates a butyric acid salt consisting of 95% butyrate and 5% calcium and magnesium. It supports a healthy gut barrier by supplying energy to cells.',
            ],
            [
                'icon' => '/dummy-img/calcium.svg',
                'question' => 'Magnesium Butyrate',
                'answer' =>
                    'At Medera Nutrition, we are proud to introduce a unique formula that blends our all-natural, vegan, and additive-free butyrates with predominantly calcium and a smaller amount of magnesium. This innovative combination creates a butyric acid salt consisting of 95% butyrate and 5% calcium and magnesium. It supports a healthy gut barrier by supplying energy to cells.',
            ],
            [
                'icon' => '/dummy-img/calcium.svg',
                'question' => 'Sodium Butyrate',
                'answer' =>
                    'At Medera Nutrition, we are proud to introduce a unique formula that blends our all-natural, vegan, and additive-free butyrates with predominantly calcium and a smaller amount of magnesium. This innovative combination creates a butyric acid salt consisting of 95% butyrate and 5% calcium and magnesium. It supports a healthy gut barrier by supplying energy to cells.',
            ],
            [
                'icon' => '/dummy-img/calcium.svg',
                'question' => 'Potassium Butyrate',
                'answer' =>
                    'At Medera Nutrition, we are proud to introduce a unique formula that blends our all-natural, vegan, and additive-free butyrates with predominantly calcium and a smaller amount of magnesium. This innovative combination creates a butyric acid salt consisting of 95% butyrate and 5% calcium and magnesium. It supports a healthy gut barrier by supplying energy to cells.',
            ],
        ];
    @endphp
    <section class="faq-section">
        <div class="container xlarge">
            <div class="row">
                <h2> Secret heroes of gut health </h2>
            </div>
            <div class="row gap-30">
                <div class="col-md-6">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/faq1.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/faq1.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/faq1.png') }}" alt="Açıklama metni">
                    </picture>
                </div>
                <div class="col-md-6">
                    @foreach ($faqSection as $key => $faq)
                        <div class="faq-item {{ $key === 0 ? 'active' : '' }}">
                            <div class="question" data-faq="{{ $key }}">
                                <div class="question-content">
                                    <img src="{{ $faq['icon'] }}" alt="" />
                                    <h4 itemprop="name">{{ $faq['question'] }}</h4>
                                </div>
                                <img src="/dummy-img/arrow.svg" class="arrow"></img>
                            </div>
                            <div class="faq-answer" itemscope itemprop="acceptedAnswer"
                                itemtype="https://schema.org/Answer">
                                <div class="answer-content" itemprop="text">
                                    {{-- DUMMY CONTENT  --}}
                                    <p class="preset-color-primary">The Energy Source for Your Gut:<br />Calcium Butyrate
                                    </p>
                                    <p>{!! $faq['answer'] !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const questions = document.querySelectorAll('.question');
            const firstAnswer = document.querySelector('.faq-item.active .faq-answer');
            if (firstAnswer) {
                firstAnswer.style.maxHeight = firstAnswer.scrollHeight + 'px';
            }

            questions.forEach(question => {
                question.addEventListener('click', function() {
                    const currentFaq = this.closest('.faq-item');
                    const currentAnswer = currentFaq.querySelector('.faq-answer');
                    const isOpen = currentFaq.classList.contains('active');
                    const activeFaqs = document.querySelectorAll('.faq-item.active');

                    if (!isOpen) {
                        activeFaqs.forEach(item => {
                            item.classList.remove('active');
                            item.querySelector('.faq-answer').style.maxHeight = '0px';
                        });
                        currentFaq.classList.add('active');
                        currentAnswer.style.maxHeight = currentAnswer.scrollHeight + 'px';
                    } else if (activeFaqs.length === 1) {
                        return;
                    } else {
                        currentFaq.classList.remove('active');
                        currentAnswer.style.maxHeight = '0px';
                    }
                });
            });
        });
    </script>

    {{-- SEC 3 Banner --}}
    <section class="go-to-form">
        <div class="container xlarge">
            <div class="row">
                <div>
                    <h4>Complete the form today and position yourself as the trusted choice for gut health solutions.</h4>
                    <a href="#">request</a>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 4 --}}
    <section class="flex6 preset-color-peach">
        <div class="container xlarge">
            <div class="row justify-space-between">
                <div class="col-md-5">
                    <h2> An All-Natural Solution for Gut Health: <strong>ButyEra</strong> </h2>
                    <p>At Medera Nutrition, we are pioneering a new era in gut health with our ButyEra —key supporters of
                        the digestive system, which plays a crucial role in overall human health. Our all-natural, vegan
                        butyrates make a significant contribution to improving human well-being.</p>
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
    <section class="list-card">
        <div class="container xlarge">
            <div class="row">
                <div class="fab-card">
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

    {{-- SEC 6 --}}
    <section class="flex6 preset-color-peach">
        <div class="container xlarge">
            <div class="row justify-space-between">
                <div class="col-md-5">
                    <h2> An All-Natural Solution for Gut Health: <strong>ButyEra</strong> </h2>
                    <p>At Medera Nutrition, we are pioneering a new era in gut health with our ButyEra —key supporters of
                        the digestive system, which plays a crucial role in overall human health. Our all-natural, vegan
                        butyrates make a significant contribution to improving human well-being.</p>
                </div>

                <div class="col-md-6 bg-coating">
                    <picture>
                        <source srcset="{{ asset('/dummy-img/gobek.png') }}" media="(min-width: 1024px)">
                        <source srcset="{{ asset('/dummy-img/gobek.png') }}" media="(min-width: 768px)">
                        <img src="{{ asset('/dummy-img/gobek.png') }}" alt="Açıklama metni">
                    </picture>
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 7 --}}
    BURAYA SLIDER GELECEK

    {{-- SEC 8 --}}
    @php
        $packagingTypes = [
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => '<strong>NATURAL</strong> Product',
            ],
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => '<strong>POWERFUL</strong> Shield',
            ],
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => '<strong>YOUTHFUL</strong> Life',
            ],
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => '<strong>HEALTHY</strong> Future',
            ],
        ];
    @endphp
    <section class="benefitgrid">
        <div class="container xlarge">
            <div class="row">
                <div class="benefits">
                    @foreach ($packagingTypes as $item)
                        <div class="__items">
                            <img src="{!! $item['icon'] !!}" alt="text" />
                            <h2> {!! $item['title'] !!} </h2>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 9 --}}
    <section class="journey-section">
        <div class="container xlarge journey-container">
            <div class="journey-image col-sm-5">
                <picture>
                    <source srcset="{{ asset('/dummy-img/for-all-beign-customflex6.png') }}" media="(min-width: 1024px)">
                    <source srcset="{{ asset('/dummy-img/for-all-beign-customflex6.png') }}" media="(min-width: 768px)">
                    <img src="{{ asset('/dummy-img/for-all-beign-customflex6.png') }}" alt="Açıklama metni">
                </picture>
            </div>
            <div class="journey-content height-500  col-sm-7 bg-light">
                <div>
                    <h3>Bring the Key to Human Health to Your Shelves with Medera Nutrition</h3>
                    <p>Enhance your customers' quality of life with our scientifically proven gut butyrates, formulated with
                        calcium, potassium, sodium, and magnesium. These butyrates help strengthen the gut barrier, reduce
                        inflammation, and support the immune system effectively.</p>
                </div>
            </div>
        </div>
    </section>


    @php
        $packagingTypes = [
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'Gut Health',
                'description' =>
                    'Nourishes colon cells and supports the renewal and protection of intestinal wall cells. Provides anti-inflammatory effects. Can reduce inflammation by boosting the activity of immune cells.',
            ],
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'Brain Health ',
                'description' =>
                    'Strengthens the blood-brain barrier, reduces neuroinflammation, and improves brain functions. Supports neurotransmitter production and combats oxidative stress.',
            ],
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'Nerve Health',
                'description' =>
                    'Butyrates protect nerve cells (neuroprotection) and support their regeneration. May reduce neuropathy and peripheral nerve damage while balancing the autonomic nervous system.',
            ],
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'Mental Health',
                'description' =>
                    'Can stabilize mood by influencing dopamine levels and can help prevent mental disorders such as depression and anxiety.',
            ],
        ];
    @endphp

    {{-- SEC 10 --}}
    <section class="list-card preset-color-primary">
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


    {{-- SEC 11 --}}
    <section class="journey-section">
        <div class="container xlarge journey-container">
            <div class="journey-content height-500  col-sm-7 bg-light">
                <div>
                    <h3>Bring the Key to Human Health to Your Shelves with Medera Nutrition</h3>
                    <p>Enhance your customers' quality of life with our scientifically proven gut butyrates, formulated with
                        calcium, potassium, sodium, and magnesium. These butyrates help strengthen the gut barrier, reduce
                        inflammation, and support the immune system effectively.</p>
                </div>
            </div>
            <div class="journey-image col-sm-5">
                <picture>
                    <source srcset="{{ asset('/dummy-img/for-all-beign-customflex6.png') }}" media="(min-width: 1024px)">
                    <source srcset="{{ asset('/dummy-img/for-all-beign-customflex6.png') }}" media="(min-width: 768px)">
                    <img src="{{ asset('/dummy-img/for-all-beign-customflex6.png') }}" alt="Açıklama metni">
                </picture>
            </div>
        </div>
    </section>

    {{-- SEC 12 HOVER --}}
    @php
        $hovered = [
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'Strengthens',
                'description' => 'Regulates bowel movements, making digestion easier.',
            ],
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'Facilitates',
                'description' => 'Regulates bowel movements, making digestion easier.',
            ],
            [
                'icon' => '/dummy-img/fab-icon.svg',
                'title' => 'Prevents',
                'description' => 'Regulates bowel movements, making digestion easier.',
            ],
        ];
    @endphp
    <section class="hovered preset-color-secondary">
        <div class="container xlarge">
            <div class="row">
                <div class="cards">
                    @foreach ($hovered as $card)
                        <div class="card">
                            <div class="card-content">
                                <img src="{{ $card['icon'] }}" />
                                <h3>{{ $card['title'] }}</h3>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="m17.613 15-5.87-6-5.872 6" stroke="#434A57" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p>{{ $card['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- SEC 13 --}}
    <section class="flex6 ">
        <div class="container xlarge">
            <div class="row justify-space-between">
                <div class="col-md-5">
                    <h2> Place Your Order Now and Discover the Difference of Medera </h2>
                    <p>Pursue the path to a healthier life and reach your goals with our high-bioavailability butyrates.
                        Contact Medera Nutrition today and take the first step toward a healthier future with our expertly
                        developed formulation.</p>
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

    {{-- SEC 14 Banner --}}
    <section class="go-to-form">
        <div class="container xlarge">
            <div class="row">
                <div>
                    <h4>Contact us to request a free sample
                        and experience the quality firsthand.</h4>
                    <a href="#">contact us</a>
                </div>
            </div>
        </div>
    </section>
@endsection
