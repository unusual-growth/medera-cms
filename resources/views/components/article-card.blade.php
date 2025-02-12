{{-- @dd(\Carbon\Carbon::parse($article->publish_start_date)->translatedFormat('d M Y')) --}}
<div class="library-card">
    <span class="date">
        {{ \Carbon\Carbon::parse($article->publish_start_date)->translatedFormat('d M Y') }}
    </span>
    @php
        $image = TwillImage::make($article, 'library-image')->crop('thumbnail')->width(730)->height(440)->toArray();

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
        <a class="secondary-cta" href="{{ route('article', $article->slug) }}">
            {{ __('frontend.Read More') }}
        </a>
    </div>
</div>
