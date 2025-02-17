<div class="library-card ">
    @php
        $has_image = $article->hasImage('library-image');
        if ($has_image) {
            $image = TwillImage::make($article, 'library-image')->crop('thumbnail')->width(421)->height(252)->toArray();
        }
    @endphp
    @if($has_image)
        {!! TwillImage::render($image) !!}
    @else
        <div style="width: 100%; height: 320px; color: white; display: flex; justify-content: center; align-items: center;">
            Please add an image.
        </div>
    @endif
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
