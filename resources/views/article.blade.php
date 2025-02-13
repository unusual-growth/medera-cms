@extends('site.layouts.master')
@section('content')
    <section class="article-hero color-white font-size-16" itemscope itemtype="https://schema.org/Article">
        <div class="container">
            <div class="library-content">
                <span>15 Jan 2025 </span>
                <h1>
                    More productive with an atmosphere of greenery
                </h1>
            </div>
        </div>
    </section>


    {{-- <section class="article-body no-padding">
        {!! $item->renderBlocks() !!}
    </section>


    @if ($relatedArticles->count() > 0)
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
    @endif --}}
@endsection
