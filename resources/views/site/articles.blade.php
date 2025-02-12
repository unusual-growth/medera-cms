@php
    $setting_block = TwillAppSettings::getGroupDataForSectionAndName('static-pages', 'library');
    $meta = arrayToObject([
        'title' => $setting_block->translatedInput('title'),
        'description' => $setting_block->translatedInput('description'),
    ]);
@endphp
@extends('site.master', ['meta' => $meta])
@section('content')

    <div class="container xlarge mb-30">
        <div class="library-content">
            <h1 class="text-align-center">
                {{ __('frontend.Library') }}
            </h1>
            @if (env('APP_TEMPLATE') === 'payroll')
                <p class="text-align-center col-md-8">
                    {{ __('frontend.library-desc.payroll') }}
                </p>
            @elseif(env('APP_TEMPLATE') === 'companies')
                <p class="text-align-center col-md-8">
                    {{ __('frontend.library-desc.companies') }}
                </p>
            @endif
        </div>


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
