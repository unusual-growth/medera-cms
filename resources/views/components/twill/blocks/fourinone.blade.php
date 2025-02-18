@php
    $color_scheme = $input('color_scheme');
@endphp
<section class="gut-health-section {{ $color_scheme == 'peach' ? 'preset-color-peach' : '' }}">
    <div class="container xlarge">
        <div class="row justify-space-between">
            <div class="col-md-5 text-content">
                {!! $translatedInput('section_text') !!}
            </div>

            <div class=" col-md-6 product-content">
                @if($block->hasImage('col_image'))
                    <img src="{{$block->image('col_image')}}" alt="Butyrate Supplement Bottle" class="product-image">
                @endif
                <div class="capsule-info preset-color-primary">
                    {!! $translatedInput('right_text') !!}
                </div>
                <div class="info-box preset-color-primary">
                    {!! $translatedInput('left_text') !!}
                </div>
            </div>
        </div>
    </div>
</section>
