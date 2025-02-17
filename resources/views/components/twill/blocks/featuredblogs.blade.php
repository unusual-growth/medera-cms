<section class="background-primary-lighten-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="sect-heading-desc col-md-9 flex-column align-items-center">
                <h2 class="text-align-center color-secondary">{{__('util.other-blogs')}}</h1>
                <p class="text-align-center">{{__('util.other-blogs-description')}}</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card-display library">
            {{-- !!TODO: put inside a slider for mobile --}}
            @foreach ($blogs as $relatedArticle)
                <x-article-card :article="$relatedArticle" />
            @endforeach
        </div>
    </div>
</section>
