@php
$contact_information = TwillAppSettings::getTranslated('footer-settings.contact.contact-information');
@endphp

<footer>
    <div class="row-top">
        <div class="container xlarge">
            <div class="row">
                <div class="col-sm-3 left">
                    <a href="/" class="logo">
                        <img src="{{ $logos->image('footer-logo') }}" alt="{{ $logos->imageAltText('footer-logo') }}">
                    </a>

                    
                    <div class="socials">
                        <p>FOLLOW US</p>
                        <div>
                            @foreach ( $social_links_block as $key => $repeaterItem)
                            <a target="_blank" href="{{ $repeaterItem->input('url') }}">
                                @php
                                  $image = $repeaterItem->image('social-media-icon', 'default');

                                @endphp
                              <img src="{{ $image }}" alt="icon" />
                            </a>
                      @endforeach


                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mid-left">
                    <p>{{ __('frontend.Product') }}</p>
                    <x-menu location="footer"/>
                </div>

                @php
                    $list2 = [
                        [
                            'text' => 'Packaging',
                        ],
                        [
                            'text' => 'Shipping & Returns',
                        ],
                        [
                            'text' => 'FAQ',
                        ],
                        [
                            'text' => 'Feedback',
                        ],
                    ];
                @endphp
                <div class="col-sm-3 mid-right">
                    <p>{{ __('frontend.LearnMore') }}</p>
                    <x-menu location="footer2"/>

                </div>
              
                <div class="col-sm-3 right">
                    {!! $contact_information !!}
                    
                </div>
            </div>

        
        </div>
    </div>

    <div class="container ful-1440 line">
        <div class="container xlarge">
            <div class="row justify-space-between">
                <div class="bottom">
                    <div class="__left">
                        <span>©2024 Medera Nutrition. {{ __('frontend.AllRightReserved') }}.</span>
                    </div>
                    <div class="__right">
                        <x-menu location="footer3"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>