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
        <div class="faq-listing" itemscope itemtype="https://schema.org/FAQPage">
            @foreach ( $faqs as $item )
                <div class="cell" itemprop="mainEntity" itemscope itemtype="https://schema.org/Question">
                    <div class="item" data-id="{{ $loop->index }}">
                        <h4>
                            <span itemprop="name">
                                {{ $item->title }}
                            </span>
                            <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="m1.751 1 5.871 6 5.871-6" stroke="#434A57" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </h4>
                        <div>
                            <div itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
                                <p itemprop="text">
                                    {{ $item->answer }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if($input('show_link'))
            <a class="primary-cta" href="/faq">Visit FAQ Page</a>
        @endif
    </div>
</section>
