@extends('site.master')
@section('content')
    @php
        // dd( $item);

    @endphp

<section class="article-hero color-white font-size-16" itemscope itemtype="https://schema.org/Article">
    <div class="container">
        <div class="library-content">
            <span itemprop="datePublished" content="{{\Carbon\Carbon::parse($item->publish_start_date)->translatedFormat('d M Y')}}">
                {{ \Carbon\Carbon::parse($item->publish_start_date)->translatedFormat('d M Y') }}
            </span>
            <h1>
                {{ $item->title }}
            </h1>
        </div>
    </div>
</section>
    <section class="article-body no-padding">
        {!! $item->renderBlocks() !!}
    </section>
    @if($relatedArticles->count() > 0)
    <section>
        <div class="container xlarge">

            <h2 class="text-align-center">
                {{ __('frontend.Other Blogs') }}
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
