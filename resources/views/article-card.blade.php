{{-- 
@php
    $image = TwillImage::make($article, 'library-image')->crop('thumbnail')->width(730)->height(440)->toArray();
@endphp

<div class="library-card">
    <span class="date">
        {{ \Carbon\Carbon::parse($article->publish_start_date)->translatedFormat('d M Y') }}
    </span>
    <a href="{{ route('article', $article->slug) }}">{!! TwillImage::render($image) !!}</a>
    <div>
        <h2 class="heading">
            <a href="{{ route('article', $article->slug) }}">{{ $article->title }}</a>
        </h2>
        <div class="desc">
            <p>
                <a href="{{ route('article', $article->slug) }}"> {{ $article->description }}</a>
            </p>
        </div>
        <a class="secondary-cta" href="{{ route('article', $article->slug) }}">
            {{ __('frontend.Read More') }}
        </a>
    </div>
</div> --}}

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
            <p class="date"> January 20,2025</p>
            <a class="library-cta" href="#">
                Read More
            </a>
        </div>
    </div>
</div>
