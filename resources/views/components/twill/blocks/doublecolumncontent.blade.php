@php
    $has_image = $block->hasImage('col_image');
    if ($has_image) {
        $image = TwillImage::make($block, 'col_image');
    }

    $image_right = $input('image_right');
    $reverse_order_mobile = $input('reverse_order_mobile');
    $color_scheme = $input('color_scheme');
@endphp
@if(!$block->input('has_middle_image'))
    <section class="flex6 {{ $color_scheme == 'peach' ? 'preset-color-peach' : '' }}">
        <div class="container xlarge">
            <div class="row {{ $reverse_order_mobile ? 'mob-rev' : '' }} {{ $image_right ? 'reverse' : '' }}">
                <div class="col-md-6 bg-coating">
                    @if($has_image)
                        {!! TwillImage::render($image, []) !!}
                    @else
                        <div style="width: 100%; height: 100%; color: white; display: flex; justify-content: center; align-items: center; background: #427277; font-size: 32px;">
                            Please add an image.
                        </div>
                    @endif
                </div>
                <div class="col-md-6 ">
                    {!! $translatedInput('text') !!}
                </div>
            </div>
        </div>
    </section>
@else
    <section class="content-image-section {{ $color_scheme == 'peach' ? 'preset-color-peach' : '' }}">
        <div class="container xlarge">
            <div class="row justify-space-between">
                <div class="col-sm-5">
                    <div>
                        {!! $translatedInput('text') !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    @if($has_image)
                        {!! TwillImage::render($image, []) !!}
                    @else
                        <div style="width: 100%; height: 100%; color: white; display: flex; justify-content: center; align-items: center; background: #427277; font-size: 32px;">
                            Please add an image.
                        </div>
                    @endif
                    <img class="bottle-img" src="{{$block->image('middle_image')}}" alt="" />
                </div>

            </div>
        </div>
    </section>
@endif
