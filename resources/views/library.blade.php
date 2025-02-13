{{-- @php
    $setting_block = TwillAppSettings::getGroupDataForSectionAndName('static-pages', 'library');
    $meta = arrayToObject([
        'title' => $setting_block->translatedInput('title'),
        'description' => $setting_block->translatedInput('description'),
    ]);
@endphp --}}
@extends('site.layouts.master')
@section('content')
    <div class="container">
        <div class="library-content">
            <h1>
                Library
            </h1>
            <p>Lorem ipsum Medera Nutrition, established in the Netherlands in 2024, specializes in the production of
                high-quality butyrate supplements.....</p>
        </div>
    </div>

    {{-- TABBED  --}}
    @php
        $categories = [
            [
                'title' => 'Category 1',
            ],
            [
                'title' => 'Category 2',
            ],
            [
                'title' => 'Category 3',
            ],
            [
                'title' => 'Category 4',
            ],
            [
                'title' => 'Category 5',
            ],
        ];
    @endphp
    <div class="container xlarge">
        <div class="library-tabbed-list">
            @foreach ($categories as $index => $category)
                <a href="#" class=" primary-cta __tabbed {{ $index == 0 ? 'active' : '' }}"
                    data-tab-id="{{ $index }}">{{ $category['title'] }}</a>
            @endforeach
        </div>
    </div>

    <div class="container xlarge mb-30">
        <div class="card-display library">

            {{-- @if ($list->isNotEmpty())
                @foreach ($list as $article)
                 <x-article-card :article="$article" />
                @endforeach
                @endif --}}


            {{-- ARTİCLE CARDTAN GELECEK ÜSTTE OLDUGU GİBİ --}}

            <div class="library-card ">
                <img src="/dummy-img/library-pic.png" />
                <div>
                    <h2 class="heading">
                        More productive with an atmosphere of greenery
                    </h2>
                    <div class="desc">
                        <p>
                            An atmosphere of greenery can increase productivity in the workplace. Studies show that plants
                            improve air quality and decrease stress...
                        </p>
                    </div>
                    <div class="bottom-line">
                        <p class="date"> January 20,2025</p>
                        <a class="library-cta" href="#">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            <div class="library-card">
                <img src="/dummy-img/library-pic.png" />
                <div>
                    <h2 class="heading">
                        More productive with an atmosphere of greenery
                    </h2>
                    <div class="desc">
                        <p>
                            An atmosphere of greenery can increase productivity in the workplace. Studies show that plants
                            improve air quality and decrease stress...
                        </p>
                    </div>
                    <div class="bottom-line">
                        {{-- <span class="date">
                            {{ \Carbon\Carbon::parse($article->publish_start_date)->translatedFormat('d M Y') }}
                        </span> --}}
                        <p class="date"> January 20,2025</p>
                        <a class="library-cta" href="#">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            <div class="library-card">
                <img src="/dummy-img/library-pic.png" />
                <div>
                    <h2 class="heading">
                        More productive with an atmosphere of greenery
                    </h2>
                    <div class="desc">
                        <p>
                            An atmosphere of greenery can increase productivity in the workplace. Studies show that plants
                            improve air quality and decrease stress...
                        </p>
                    </div>
                    <div class="bottom-line">
                        {{-- <span class="date">
                            {{ \Carbon\Carbon::parse($article->publish_start_date)->translatedFormat('d M Y') }}
                        </span> --}}
                        <p class="date"> January 20,2025</p>
                        <a class="library-cta" href="#">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            <div class="library-card">
                <img src="/dummy-img/library-pic.png" />
                <div>
                    <h2 class="heading">
                        More productive with an atmosphere of greenery
                    </h2>
                    <div class="desc">
                        <p>
                            An atmosphere of greenery can increase productivity in the workplace. Studies show that plants
                            improve air quality and decrease stress...
                        </p>
                    </div>
                    <div class="bottom-line">
                        {{-- <span class="date">
                            {{ \Carbon\Carbon::parse($article->publish_start_date)->translatedFormat('d M Y') }}
                        </span> --}}
                        <p class="date"> January 20,2025</p>
                        <a class="library-cta" href="#">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            <div class="library-card">
                <img src="/dummy-img/library-pic.png" />
                <div>
                    <h2 class="heading">
                        More productive with an atmosphere of greenery
                    </h2>
                    <div class="desc">
                        <p>
                            An atmosphere of greenery can increase productivity in the workplace. Studies show that plants
                            improve air quality and decrease stress...
                        </p>
                    </div>
                    <div class="bottom-line">
                        {{-- <span class="date">
                            {{ \Carbon\Carbon::parse($article->publish_start_date)->translatedFormat('d M Y') }}
                        </span> --}}
                        <p class="date"> January 20,2025</p>
                        <a class="library-cta" href="#">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            <div class="library-card">
                <img src="/dummy-img/library-pic.png" />
                <div>
                    <h2 class="heading">
                        More productive with an atmosphere of greenery
                    </h2>
                    <div class="desc">
                        <p>
                            An atmosphere of greenery can increase productivity in the workplace. Studies show that plants
                            improve air quality and decrease stress...
                        </p>
                    </div>
                    <div class="bottom-line">
                        {{-- <span class="date">
                            {{ \Carbon\Carbon::parse($article->publish_start_date)->translatedFormat('d M Y') }}
                        </span> --}}
                        <p class="date"> January 20,2025</p>
                        <a class="library-cta" href="#">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            <div class="library-card">
                <img src="/dummy-img/library-pic.png" />
                <div>
                    <h2 class="heading">
                        More productive with an atmosphere of greenery
                    </h2>
                    <div class="desc">
                        <p>
                            An atmosphere of greenery can increase productivity in the workplace. Studies show that plants
                            improve air quality and decrease stress...
                        </p>
                    </div>
                    <div class="bottom-line">
                        {{-- <span class="date">
                            {{ \Carbon\Carbon::parse($article->publish_start_date)->translatedFormat('d M Y') }}
                        </span> --}}
                        <p class="date"> January 20,2025</p>
                        <a class="library-cta" href="#">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            <div class="library-card">
                <img src="/dummy-img/library-pic.png" />
                <div>
                    <h2 class="heading">
                        More productive with an atmosphere of greenery
                    </h2>
                    <div class="desc">
                        <p>
                            An atmosphere of greenery can increase productivity in the workplace. Studies show that plants
                            improve air quality and decrease stress...
                        </p>
                    </div>
                    <div class="bottom-line">
                        {{-- <span class="date">
                            {{ \Carbon\Carbon::parse($article->publish_start_date)->translatedFormat('d M Y') }}
                        </span> --}}
                        <p class="date"> January 20,2025</p>
                        <a class="library-cta" href="#">
                            Read More
                        </a>
                    </div>
                </div>
            </div>


        </div>
        <div class="pagination">

            {{-- @if ($list->hasPages())
                {{ $list->links() }}
            @endif --}}
        </div>
    </div>
@endsection
