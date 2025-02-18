<section class="">
    <div class="container xlarge">
        <div>
            <h2 class="font-weight-700">
                {{ $translatedInput('heading') }}
            </h2>
            <h4 class="color-secondary">
                {{ $translatedInput('text')}}
            </h4>
        </div>
        <div class="faq-listing">
            @foreach ( $faqs as $item )
                <div class="cell">
                    <div class="item" data-id="{{ $loop->index }}">
                        <h4>
                            {{ $item->title }}
                        </h4>
                        <div>
                            <div>
                                <p>
                                    {{ $item->answer }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
