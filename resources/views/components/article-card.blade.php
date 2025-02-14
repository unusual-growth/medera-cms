<div class="library-card ">
    @php
    $image = TwillImage::make($article, 'library-image')->crop('thumbnail')->width(421)->height(252)->toArray();

@endphp
    {!! TwillImage::render($image) !!}
    <div>
        <h2 class="heading">
            {{ $article->title }}
        </h2>
        <div class="desc">
            <p>
                {{ $article->description }}
            </p>
        </div>
        <div class="bottom-line">
            <p class="date">         {{ \Carbon\Carbon::parse($article->publish_start_date)->translatedFormat('d M Y') }}
            </p>
            <a class="library-cta" href="{{ route('article', $article->slug) }}">
                {{ __('frontend.Read More') }}
            </a>
        </div>
    </div>
</div>
