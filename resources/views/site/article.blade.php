@extends('site.master')
@section('content')
    @php
        // dd( $item);

    @endphp
    <section class="article-hero color-white font-size-16" itemscope itemtype="https://schema.org/Article">
        @php
            // $image = TwillImage::make($item, 'library-image')->crop('default')->width(2880)->height(800);
            //  $image["image"]["itemprop"]="image";
            // dd($image)
            // dd($item->image('library-image','default'));
        @endphp
        {{-- {!! TwillImage::render($image) !!} --}}
        <picture>
            <img src="{{ $item->image('library-image','default') }}" alt="{{ $item->title }}" itemprop="image">
        </picture>

        <div class="container medium text-align-center">

            <p class="text-align-center">
                <span class="date text-align-center" itemprop="datePublished" content="{{\Carbon\Carbon::parse($item->publish_start_date)}}">
                    {{ \Carbon\Carbon::parse($item->publish_start_date)->translatedFormat('d M Y') }}
                </span>
            </p>
            <h1 itemprop="headline">
                {{ $item->title }}
            </h1>
            <p></p>
        </div>
    </section>
    <section class="article-body no-padding">
        {!! $item->renderBlocks() !!}
    </section>
    @if($relatedArticles->count() > 0)
    <section>
        <div class="container xlarge">

            <h2 class="text-align-center">
                Other Blogs
            </h2>
            <div class="card-display library">
                @foreach ($relatedArticles as $relatedArticle)
                 <x-article-card :article="$relatedArticle" />
                @endforeach

            </div>
        </div>
    </section>
    @endif
@endsection
