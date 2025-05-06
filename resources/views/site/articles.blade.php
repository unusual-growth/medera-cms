@php
    $category_id = $category ? $category->id : null;
    $meta = null;
    $setting_block = TwillAppSettings::getGroupDataForSectionAndName('static-pages', 'library');
    if(!$category){
                $meta = arrayToObject([
            'title' => $setting_block->translatedInput('title'),
            'description' => $setting_block->translatedInput('description'),
        ]);
    }
@endphp
@extends('site.master', ['meta' => $meta])
@section('content')
    <section class="hero forest-to-gray">
        <div class="container xlarge">
            <div class="row gap-30 justify-space-between subpage">
                <div class="col-sm-6 flex-center">
                    <div class="content library-content">
                        <h1>
                            {{ __('frontend.Library')   }}

                            {{ $setting_block->translatedInput('hero_title') }}
                        </h1>
                        <p>
                            {{ $setting_block->translatedInput('hero_description') }}
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 image">

                    <picture class="width-100 height-100">
                        <img
                            src="{{ImageService::getRawUrl($setting_block->imageObject('banner-image')->uuid)}}" />
                    </picture>
                </div>
            </div>
        </div>
    </section>

    <div class="container xlarge">
        <div class="library-tabbed-list">
            <a href="{{ route('articles') }}" class="primary-cta __tabbed {{ !$category_id ? 'active' : '' }}"
               data-tab-id="0">
                {{ __('frontend.All') }}
            </a>
            @foreach($categories as $key => $c)
                <a href="{{ route('blog_category', $c->slug) }}"
                   class="primary-cta __tabbed {{ $c->id === $category_id ? 'active' : '' }}" data-tab-id="{{ $key }}">
                    {{ $c->title }}
                </a>
            @endforeach
        </div>
        <div class="library-search-bar">
            <form action="{{ route('articles') }}" method="GET" class="search-form">
                <input
                    type="text"
                    name="search"
                    value="{{ $searchQuery ?? '' }}"
                    placeholder="{{ __('Search articles...') }}"
                >
                <button type="submit">{{ __('Search') }}</button>
            </form>
            @if(isset($searchQuery))
                <div class="search-results">
                    <h2>{{ __('Search results for:') }} "{{ $searchQuery }}"</h2>
                    <p>{{ $list->total() }} {{ __('results found') }}</p>
                </div>
            @endif
        </div>
    </div>





    <div class="container xlarge mb-30">


        <div class="card-display library">

            @if ($list->isNotEmpty())
                @foreach ($list as $article)
                    <x-article-card :article="$article" />
                @endforeach
            @endif

        </div>
        <div class="pagination">

            @if ($list->hasPages())
                {{ $list->links() }}
            @endif
        </div>
    </div>
@endsection
